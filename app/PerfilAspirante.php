<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilAspirante extends Model
{
  protected $fillable = [
    'foto',
    'cv',
    'fecha_nacimiento',
    'descripcion',
    'telefono',
    'estado_id',
    'municipio_id',
    'cp',
    'nacionalidad',
    'especialidad_id',
    'civil_status_id',
    'habilidades',
    'user_id'
  ];

  /**
   * Portafolio pertenecientes a este PerfilAspirante.
   */
  public function portafolios()
  {
      return $this->hasMany(Portafolio::class);
  }
}
