<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    // ...

    public function payWithPayPal(Request $request)
    {
        $user_id = $request->user_id;
        $plan_id = $request->plan_id;
        $plan = Plan::find($plan_id);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($plan->price);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($plan->name);

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            Session::put('custom', ['user_id' => $user_id, 'plan_id' => $plan_id]);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $custom = Session::get('custom');
        $user_id = $custom['user_id'];
        $plan_id = $custom['plan_id'];
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/home?status=error');
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
          $currentTimestamp = Carbon::now();
          $plan = Plan::find($plan_id);
          $alreadyPlan = Compra::where([
              ['user_id', $user_id],
              ['plan_id', $plan_id],
              ['finish_at', '>', $currentTimestamp]
          ])->first();

          //Inicializamos compra
          $compra = new Compra;
          $compra->user_id = $user_id;
          $compra->plan_id = $plan_id;
          $compra->price = $plan->price;

          if($alreadyPlan){
              $compra->start_at = $alreadyPlan->finish_at;
              $compra->finish_at = Carbon::createFromFormat('Y-m-d H:i:s', $alreadyPlan->finish_at)->addDays(30)->format('Y-m-d H:i:s');
          }else{
              $compra->start_at = $currentTimestamp;
              $compra->finish_at = $currentTimestamp->addDays(30)->format('Y-m-d H:i:s');
          }
          $compra->save();

          return redirect('/home?status=success');
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/home?status=error');
    }
}
