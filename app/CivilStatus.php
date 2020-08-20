@ -1,19 +0,0 @@
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'slug',
  ];
}
