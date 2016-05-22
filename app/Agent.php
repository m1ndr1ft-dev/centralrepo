<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{

  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'agents';

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
    'industry',
    'founder',
  );

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function employees()
  {
    return $this->hasMany('App\Employee');
  }


}
