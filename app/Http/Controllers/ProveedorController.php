<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Tipo_Documento;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proveedor = Proveedor::all();
        return view('proveedor/index',compact('proveedor'));
    }

    
    public function create()
    {
        $proveedor = Proveedor::all();
        $tipo_documento = Tipo_Documento::all();
        return view('proveedor/create', compact('proveedor','tipo_documento'));
    }

   
    public function store(Request $request)
    {
         $proveedor = new Proveedor();
         $proveedor->nombre_proveedor = request('nombre_proveedor');
         $proveedor->tipo_documento_id = request('tipo_documento_id');
         $proveedor->numero_documento_proveedor = request('numero_documento_proveedor');
         $proveedor->telefono_proveedor = request('telefono_proveedor');
         $proveedor->email_proveedor = request('email_proveedor');
         $proveedor->save();
          return redirect()->route('proveedor/index')->with('mensaje1','peoveedor añadido');
    }

   
    public function show(Proveedor $proveedor)
    {
        //
    }

   
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        $tipo_documento = Tipo_Documento::all();
        return view('proveedor/edit', compact('proveedor','tipo_documento'));
    }

    
    public function update(Request $request,  $id)
    {
            $proveedor = Proveedor::findOrFail($id);   
            $proveedor->nombre_proveedor = request('nombre_proveedor');
            $proveedor->tipo_documento_id = request('tipo_documento_id');
            $proveedor->numero_documento_proveedor = request('numero_documento_proveedor');
            $proveedor->telefono_proveedor = request('telefono_proveedor');
            $proveedor->email_proveedor = request('email_proveedor');
          
            
            $proveedor->save();
            return redirect()->route('proveedor/index')->with('mensaje3','proveedor editado');   
    }

    
    public function destroy(Proveedor $proveedor)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return redirect()->route('proveedor/index')->with('mensaje2','proveedor Eliminado');
    }

    public function desactivar($id){
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado_id =2;
        $proveedor->save();
        return redirect()->route('proveedor/index');
    }
    public function activar($id){
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado_id =1;
        $proveedor->save();
        return redirect()->route('proveedor/index');
    }
}
