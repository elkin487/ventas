<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoArticulo extends Model
{
    protected $table= 'ingreso_articulo';
    protected $primaryKey ='ingreso_articulo_id';
    public $timestamps = false;


    protected $fillable=[
        'cantidad','precio_compra', 'precio_venta','total',
    ];


    protected $hidden = [
        'ingreso_articulo_id','ingreso_id','articulo_id',
    ];

    public function articulo()
    {
    return $this->belongsTo( 'App\Articulo', 'articulo_id', 'articulo_id' );
    }

    public function ingreso()
    {
    return $this->belongsTo( 'App\Ingreso', 'ingreso_id', 'ingreso_id' );
    }

  
}

