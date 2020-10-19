<?php

namespace App\Http\Controllers;

use App\CivilStatus;
use App\Especialidad;
use App\Estado;
use App\Municipio;
use App\Prestacion;
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
  public function estadosCiviles()
  {
    return response()->json(CivilStatus::all());
  }
  public function areaEspecialidad()
  {
    return response()->json(Especialidad::all());
  }
  public function prestaciones()
  {
    return response()->json(Prestacion::all());
  }
}
