<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Documento extends Model
{
     
    protected $table= 'tipo_documento';
    protected $primaryKey ='tipo_documento_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_tipo_documento',
    ];
    protected $hidden = [
        'tipo_documento_id',
    ];


    
    public function cliente()
     {
        return $this->hasMany('App\cliente', 'tipo_documento_id', 'tipo_documento_id');
     }
 
     public function proveedor()
     {
        return $this->hasMany('App\proveedor', 'tipo_documento_id', 'tipo_documento_id');
     }
}
