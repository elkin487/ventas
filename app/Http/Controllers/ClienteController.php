<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Tipo_Documento;
use Illuminate\Http\Request;
class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cliente = Cliente::all();
        return view('cliente/index', compact('cliente'));
            
    }

    
    public function create()
    {
        $cliente = Cliente::all();
        $tipo_documento = Tipo_Documento::all();
        return view('cliente/create', compact('cliente','tipo_documento'));
    }

   
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre_cliente = request('nombre_cliente');
        $cliente->tipo_documento_id = request('tipo_documento_id');
        $cliente->numero_doc_cliente = request('numero_doc_cliente');
        $cliente->telefono_cliente = request('telefono_cliente');
        $cliente->direccion_cliente = request('direccion_cliente');
        $cliente->email_cliente = request('email_cliente');
        $cliente->save();
         return redirect()->route('cliente/index')->with('mensaje1','Cliente añadido');
    }

    
    public function show(Cliente $cliente)
    {
        //
    }

   
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $tipo_documento = Tipo_Documento::all();
        return view('cliente/edit', compact('cliente','tipo_documento'));
    }

    
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);   
        $cliente->nombre_cliente = request('nombre_cliente');
        $cliente->tipo_documento_id = request('tipo_documento_id');
        $cliente->numero_doc_cliente = request('numero_doc_cliente');
        $cliente->telefono_cliente = request('telefono_cliente');
        $cliente->direccion_cliente = request('direccion_cliente');
        $cliente->email_cliente = request('email_cliente');
        
      
        
        $cliente->save();
        return redirect()->route('cliente/index')->with('mensaje3','cliente editado'); 
    }

   
    public function destroy(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente/index')->with('mensaje2','Cliente Eliminado');
    }

    public function desactivar($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->estado_id =2;
        $cliente->save();
        return redirect()->route('cliente/index');
    }
    public function activar($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->estado_id =1;
        $cliente->save();
        return redirect()->route('cliente/index');
    }
}


