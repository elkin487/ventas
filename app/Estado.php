<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table= 'estado';
    protected $primarykey= 'estado_id';
    public $timestamps=false;

    protected $fillable=[
        'nombre_estado',

    ];

    protected $hidden=[
        'estado_id',

    ];
    
    public function articulo()
    {
       return $this->hasMany('App\articulo', 'estado_id', 'estado_id');
    }
    public function categoria()
    {
       return $this->hasMany('App\categoria', 'estado_id', 'estado_id');
    }
    public function cliente()
    {
       return $this->hasMany('App\cliente', 'estado_id', 'estado_id');
    }
    public function ingreso()
    {
       return $this->hasMany('App\ingreso', 'estado_id', 'estado_id');
    }
    public function proveedor()
    {
       return $this->hasMany('App\proveedor', 'estado_id', 'estado_id');
    }
    public function venta()
    {
       return $this->hasMany('App\venta', 'estado_id', 'estado_id');
    }

}