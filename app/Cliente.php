<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table= 'cliente';
    protected $primaryKey ='cliente_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_cliente','numero_doc_cliente', 'telefono_cliente','direccion_cliente', 'email_cliente',
    ];
    protected $hidden = [
        'cliente_id','tipo_documento_id','estado_id',
    ];


    
    public function tipo_documento(){

        return $this->belongsTo('App\Tipo_Documento', 'tipo_documento_id','tipo_documento_id');

    }

    public function ingreso()
     {
        return $this->hasMany('App\Ingreso', 'cliente_id', 'cliente_id');
     }

     public function estado(){

        return $this->belongsTo('App\Estado', 'estado_id','estado_id');

    }
}
