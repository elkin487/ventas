<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Comprobante;
use App\venta;
use App\Articulo;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
     $venta = Venta::all();
        return view('venta/index', compact('venta'));
    }

  
    public function create()
    {
        $venta = Venta::all();
        $cliente = Cliente::all();
        $comprobante = Comprobante::all();
        $articulo = Articulo::all();
        return view('venta/create', compact('venta','cliente','comprobante','articulo'));
    }

   
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->cliente_id = request('cliente_id');
        $venta->comprobante_id = request('comprobante_id');
        $venta->serie_venta= request('serie_venta');
        $venta->numero_venta = request('numero_venta');
        $venta->articulo_id = request('articulo_id');
        $venta->stok = request('stok');
        $venta->cantidad_venta = request('cantidad_venta');
        $venta->precio_venta = request('precio_venta');
        $venta->descuento_venta = request('descuento_venta');
        
        $venta->save();
         return redirect()->route('venta/index')->with('mensaje1',' Nueva venta añadida');
    }

   
    public function show(venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(venta $venta)
    {
        //
    }
}
