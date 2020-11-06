<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
  protected $fillable = [
    'url', 'perfil_aspirante_id'
  ];
}
