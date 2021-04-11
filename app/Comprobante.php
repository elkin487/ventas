<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table= 'comprobante';
    protected $primaryKey ='comprobante_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_comprobante',
    ];
    protected $hidden = [
        'comprobante_id',
    ];
    public function ingreso()
    {
       return $this->hasMany('App\Ingreso', 'comprobante_id', 'comprobante_id');
    }

    public function venta()
    {
       return $this->hasMany('App\Venta', 'comprobante_id', 'comprobante_id');
    }
}
