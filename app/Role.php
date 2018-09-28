<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function users() {
    	return $this->belongsToMany('App\User');//belongsToMany('App\User', 'role_user', 'role_id', 'user_id')
    }
}
