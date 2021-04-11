<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table= 'categoria';
    protected $primaryKey ='categoria_id';
    public $timestamps = false;


    protected $fillable=[
        'nombre_categoria','descripcion_categoria',
    ];
    protected $hidden = [
        'categoria_id',
    ];

    public function Articulo()
    {
        return $this->hasMany('App\Articulo', 'categoria_id', 'categoria_id');
    }
    
}
