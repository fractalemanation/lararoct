<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $guarded = [];//Разрешено все заполнять

    public function user()
    {
        return $this->belongsTo('App\User');//belongsTo('App\User', 'user_id', 'id') - находим пользователя, 2 параметр в таблице животных, а третий в таблице пользователей
    }
}
