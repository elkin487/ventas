<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table= 'rol';
    protected $primaryKey ='rol_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_rol',
    ];
    protected $hidden = [
        'rol_id',
    ];
    public function user()
    {
       return $this->hasMany('App\user', 'rol_id', 'rol_id');
    }
}

