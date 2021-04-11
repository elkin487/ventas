<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

   
    protected $fillable = [
        'name', 'email', 'create_at','password','rol_id'
        ];
    
    protected $hidden = [
        'password', 'remember_token','id',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol(){

        return $this->belongsTo('App\Rol', 'rol_id','rol_id');

    }
    public function estado(){

        return $this->belongsTo('App\Estado', 'estado_id','estado_id');

    }
    public function user()
    {
       return $this->hasMany('App\User', 'estado_id', 'estado_id');
    }
}


