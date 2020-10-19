<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/test', function () {
    $faker = Faker\Factory::create();
    $test = \App\Prestacion::inRandomOrder()->limit($faker->numberBetween(1, 9))->get('id')->pluck('id')->toArray();
    dd($test);
});
 */

Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
Route::get('/paypal/status', 'PaymentController@payPalStatus');
