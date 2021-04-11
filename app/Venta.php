<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table='venta';
    protected $primarykey='venta_id';
    public $timestamps= false;
    
    protected $filable=[
        'serie_venta','numero_venta','cantidad_venta','precio_venta','stok','descuento_venta','time_create',
        
    ];

    protected $hidden=[
        'venta_id','cliente_id','comprobante_id','articulo_id','estado_id',
    ];

    public function comprobante(){

        return $this->belongsTo('App\comprobante', 'comprobante_id','comprobante_id');

    }

    public function cliente(){
        return $this->belongsTo('App\cliente','cliente_id','cliente_id');
    }
    public function estado(){

        return $this->belongsTo('App\Estado', 'estado_id','estado_id');

    }
}
