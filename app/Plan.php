<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  public $timestamps = false;

  protected $fillable = [
    'name',
    'price',
    'publicaciones_normales',
    'publicaciones_urgentes'
  ];
}
