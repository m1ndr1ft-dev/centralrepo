<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
      'name',
      'email',
      'password',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array(
      'password',
      'remember_token',
    );

    public function agents() {
        return $this->hasMany('App\Agent');
    }

    public function employees() {

        return $this->hasManyThrough('App\Employee', 'App\Agent');
    }
}
