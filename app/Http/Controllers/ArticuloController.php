<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articulo = Articulo::all();
        return view('articulo/index',compact('articulo'));
    }
   
    public function create()
    {
        

        $articulo = Articulo::all();
        $categoria = Categoria::all();
        return view('articulo/create', compact('articulo','categoria'));
    }

    public function store(Request $request)
    {
        // validacion
        request()->validate([
            'nombre_articulo'=>'required',
            'codigo_articulo'=>'required|unique:Articulo',
            'categoria_id'=>'required',
            'stok'=>'required|numeric',
            'imagen'=>'image|max:2040',
        ]);

        // imagen
        $foto = $request->file('imagen');
        if($foto){
        $img = $request->file('imagen')->store('public/img');
        $url = Storage::url($img);
    }else{

        $img = 'img/caja.png';
        $url = Storage::url($img);
    }
        $articulo = new Articulo();
        $articulo->nombre_articulo = request('nombre_articulo');
        $articulo->codigo_articulo = request('codigo_articulo');
        $articulo->categoria_id = request('categoria_id');
        $articulo->stok = request('stok');
        $articulo->imagen=$url;


        $articulo->save();
        return redirect()->route('articulo');
    }
   
    public function show(Articulo $articulo)
    {
        //
    }

   
    public function edit($id)
    {
        $articulo = Articulo::find($id);
        $categoria = Categoria::all();
        return view('articulo/edit', compact('articulo','categoria'));
    }

 
    public function update(Request $request, $id)
    {
        $articulo = Articulo::findOrFail($id);   
        
        
        
            $articulo->nombre_articulo = request('nombre_articulo');
            $articulo->codigo_articulo = request('codigo_articulo');
            $articulo->categoria_id = request('categoria_id');
            $articulo->stok = request('stok');
            // $articulo->imagen=$url;
            
            $articulo->save();
        
            return redirect()->route('articulo')->with('mensaje3','Categoria editada');        

            
    }

  
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();
        return redirect()->route('articulo')->with('mensaje1','Categoria Eliminada');
    }

    public function desactivar($id){
        $articulo = Articulo::findOrFail($id);
        $articulo->estado_id =2;
        $articulo->save();
        return redirect()->route('articulo');
    }
    public function activar($id){
        $articulo = Articulo::findOrFail($id);
        $articulo->estado_id =1;
        $articulo->save();
        return redirect()->route('articulo');
    }
}
