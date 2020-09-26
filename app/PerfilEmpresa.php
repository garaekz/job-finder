<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilEmpresa extends Model
{
  protected $fillable = [
    'nombre_comercial',
    'descripcion',
    'telefono',
    'estado_id',
    'municipio_id',
    'cp',
    'rfc',
    'razon_social',
    'web',
    'empleados'
  ];
}
