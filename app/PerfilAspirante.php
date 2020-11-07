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
   * El Municipio dueño de este PerfilAspirante.
   */
  public function municipio()
  {
      return $this->belongsTo(Municipio::class);
  }
  /**
   * La especialidad dueña de este PerfilAspirante.
   */
  public function especialidad()
  {
      return $this->belongsTo(Especialidad::class);
  }
  /**
   * El Estado dueño de este PerfilAspirante.
   */
  public function estado()
  {
      return $this->belongsTo(Estado::class);
  }

  /**
   * Portafolio pertenecientes a este PerfilAspirante.
   */
  public function portafolios()
  {
      return $this->hasMany(Portafolio::class);
  }
}
