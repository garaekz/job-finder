<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Municipio;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
  public function estados()
  {
    return response()->json(Estado::all());
  }
  public function municipios($id)
  {
    return response()->json(Municipio::where('estado_id', $id)->get());
  }
}
