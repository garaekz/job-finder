<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
  public $timestamps = false;

  protected $fillable = [
    'user_id',
    'vacante_id',
  ];
}
