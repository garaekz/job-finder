<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
  protected $fillable = [
    'user_id', 'lugar', 'inicio', 'termino'
  ];
}
