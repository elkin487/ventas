<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table= 'ingreso';
    protected $primaryKey ='ingreso_id';
    public $timestamps = false;


    protected $fillable=[
        'serie_ingreso','numero_ingreso', 'fecha_create',
    ];
    protected $hidden = [
        'ingreso_id','proveedor_id','comprobante_id','estado_id',
    ];

    public function articulos()
    { 
      return $this->belongsToMany( 'App\Articulo', 'App\IngresoArticulo', 'ingreso_id', 'articulo_id' )
      ->withPivot('cantidad', 'precio_compra', 'precio_venta');
    }

    public function ingreso_articulo()
    {
        return $this->hasMany( 'App\IngresoArticulo', 'ingreso_id', 'ingreso_id' );
    }


    public function proveedor(){

        return $this->belongsTo('App\Proveedor', 'proveedor_id','proveedor_id');

    }
    public function comprobante(){

        return $this->belongsTo('App\Comprobante', 'comprobante_id','comprobante_id');

    }
    public function estado(){

        return $this->belongsTo('App\Estado', 'estado_id','estado_id');

    }
    public function articulo(){

        return $this->belongsTo('App\Articulo', 'articulo_id','articulo_id');

    }
}
