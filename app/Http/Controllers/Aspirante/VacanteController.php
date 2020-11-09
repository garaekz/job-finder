<?php

namespace App\Http\Controllers\Aspirante;

use App\Http\Controllers\Controller;
use App\Vacante;
use Illuminate\Support\Facades\Auth;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Vacante::with(['estado','user'])->whereHas('interesados', function ($q)
      {
        $q->where('id', Auth::id());
      })->orderBy('id', 'desc')->paginate(20);
    }
}
