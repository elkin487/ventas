<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table= 'configuracion';
    protected $primaryKey ='configuracion_id';
    public $timestamps = false;


    protected $fillable=[
        'empresa','direccion','pais','ciudad','telefono','email',
    ];
    protected $hidden = [
        'configuracion_id',
    ];
}
