<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
  
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'employees';

  /**
   * Protects a carbon instance from cascade
   */
  protected $date = array('deleted_at');

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = array(
    'name',
    'slug',
    'email',
    'title',
  );

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function agent()
  {
    return $this->belongsTo('App\Agent');
  }
}
