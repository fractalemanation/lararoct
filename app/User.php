<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];//Столбцы которые разрешены для автоматического заполнения

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Email
    public function setEmailAttribute($value){
        if(empty($value)){
        $faker = \Faker\Factory::create();
        $this->attributes['email'] = $faker->unique()->safeEmail;//Генерация почты
        }else{
        $this->attributes['email'] = $value;
        }
    }

    // Password hashing
    public function setPasswordAttribute($value){
        if(empty($value)){
            $this->attributes['password'] = \Hash::make('123456');//Генерация пароля
        }
    }

    public function animal()
    {
        return $this->hasOne('App\Animal');//hasOne('App\Animal', 'user_id', 'id') - находим животное, 2 параметр в таблице животных, а третий в таблице пользователей
    }

    public function roles() {
        return $this->belongsToMany('App\Role');//belongsToMany('App\User', 'role_user', 'user_id', 'role_id')
    }
}