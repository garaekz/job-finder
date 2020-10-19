<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
  protected $table = 'prestaciones';
  public $timestamps = false;

  protected $fillable = [
    'name'
  ];
  /**
   * Las Vacantes que pertenecen a esta Prestacion.
   */
  public function vacantes()
  {
      return $this->belongsToMany(Vacante::class);
  }
}
