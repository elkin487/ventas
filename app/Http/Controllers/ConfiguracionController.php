<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracion = Configuracion::all();
        return view('configuracion/index',compact('configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configuracion = Configuracion::all();
        if(count($configuracion)==0){
        return view('configuracion/create',compact('configuracion'));
        }else{
            return redirect()->route('configuracion');
        }
    }

    
    public function store(Request $request)
    {
        $configuracion = new Configuracion();

        $configuracion->empresa = request('empresa');
        $configuracion->direccion = request('direccion');
        $configuracion->pais = request('pais');
        $configuracion->ciudad = request('ciudad');
        $configuracion->telefono = request('telefono');
        $configuracion->email = request('email');

        $configuracion->save();

        return redirect()->route('configuracion')->with('mensaje','Configurado ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuracion = Configuracion::find($id);
        return view('configuracion/edit', compact('configuracion',));
    }

   
    public function update(Request $request, $id)
    {
        $configuracion = Configuracion::findOrFail($id);   
        $configuracion->empresa = request('empresa');
        $configuracion->direccion = request('direccion');
        $configuracion->pais = request('pais');
        $configuracion->ciudad = request('ciudad');
        $configuracion->telefono = request('telefono');
        $configuracion->email = request('email');
        
        $configuracion->save();
        return redirect()->route('configuracion')->with('mensaje3','configuracion editada'); 
    }

    
    public function destroy($id)
    {
        $configuracion = Configuracion::findOrFail($id);
        $configuracion->delete();
        return redirect()->route('configuracion')->with('mensaje2','Configuracion eliminada');
    }
}
