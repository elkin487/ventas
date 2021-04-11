<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categoria = Categoria::all();
        return view('categoria/index',compact('categoria'));
    }
    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre_categoria=request('nombre_categoria');
        $categoria->descripcion_categoria=request('descripcion_categoria');
        $categoria->save();
        return redirect()->route('categoria')->with('mensaje2','Categoria Creada');

    }

    
    public function show(Categoria $categoria)
    {
        //
    }

    
    public function edit(Categoria $categoria)
    {
        //
    }

    
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria')->with('mensaje1','Categoria Eliminada');
    }
}
