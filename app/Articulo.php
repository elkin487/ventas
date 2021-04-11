<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table= 'articulo';
    protected $primaryKey ='articulo_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_articulo','codigo_articulo', 'stok','imagen', 'estado_id',
    ];
    protected $hidden = [
        'articulo_id','categoria_id','estado_id',
    ];
    public function categoria(){

        return $this->belongsTo('App\Categoria', 'categoria_id','categoria_id');

    }

    public function Articulo()
    {
        return $this->hasMany('App\Articulo', 'ingreso_id', 'ingreso_id');
    }

    public function estado(){

        return $this->belongsTo('App\Estado', 'estado_id','estado_id');

    }
    public function ingreso_articulo()
    {
        return $this->hasMany( 'App\IngresoArticulo', 'articulo_id', 'articulo_id' );
    }
    public function ingresos()
    {
        return $this->belongsToMany( 'App\Ingreso', 'App\IngresoArticulo', 'articulo_id', 'ingreso_id' )
        ->withPivot('cantidad', 'precio_compra', 'precio_venta');
    }

}