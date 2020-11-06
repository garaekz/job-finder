<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{

  protected $fillable = [
    'empresa',
    'puesto',
    'jornada',
    'edad',
    'sexo',
    'experiencia',
    'sueldo',
    'estado_id',
    'user_id',
    'comentario',
    'telefono',
    'email',
    'otros_requisitos',
    'otras_prestaciones',
    'actividades',
    'descripcion',
    'finish_at',
    'compra_id',
    'is_urgente'
  ];
  /**
   * El Estado al que pertenece la Vacante.
   */
  public function estado()
  {
      return $this->belongsTo(Estado::class);
  }

  /**
   * La Compra dueña de esta Vacante.
   */
  public function compra()
  {
      return $this->belongsTo(Compra::class);
  }

  /**
   * El User dueño de esta Vacante.
   */
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  /**
   * Las Prestaciones que pertenecen a esta Vacante.
   */
  public function prestaciones()
  {
      return $this->belongsToMany(Prestacion::class);
  }
}
