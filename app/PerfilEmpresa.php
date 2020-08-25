<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilEmpresa extends Model
{
  protected $fillable = [
    'logo',
    'nombre_comercial',
    'descripcion',
    'telefono',
    'estado_id',
    'municipio_id',
    'cp',
    'web',
    'empleados'
  ];
}
