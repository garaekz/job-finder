<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
  protected $fillable = [
    'user_id', 'empresa', 'inicio', 'termino', 'sueldo', 'puesto', 'desc_actividades', 'motivo_separacion'
  ];
}
