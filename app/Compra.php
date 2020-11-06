<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  protected $fillable = [
    'user_id',
    'plan_id',
    'price',
    'start_at',
    'finish_at'
  ];

  /**
   * El Plan dueño de esta Compra.
   */
  public function plan()
  {
      return $this->belongsTo(Plan::class);
  }

  /**
   * El User dueño de esta Compra.
   */
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  /**
   * La(s) Vacante(s) pertenecientes a esta Compra.
   */
  public function vacantes()
  {
      return $this->hasMany(Vacante::class);
  }
}
