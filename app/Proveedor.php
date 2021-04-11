<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table= 'proveedor';
    protected $primaryKey ='proveedor_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_proveedor','numero_documento_proveedor','telefono_proveedor','email_proveedor',
    ];
    protected $hidden = [
        'proveedor_id','tipo_documento_id','estado_id',
    ];

    public function tipo_documento(){

        return $this->belongsTo('App\Tipo_Documento', 'tipo_documento_id','tipo_documento_id');

    }
    public function ingreso()
    {
       return $this->hasMany('App\Ingreso', 'proveedor_id', 'proveedor_id');
    }
    public function estado(){

        return $this->belongsTo('App\Estado', 'estado_id','estado_id');

    }
}
