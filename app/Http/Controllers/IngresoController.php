<?php

namespace App\Http\Controllers;

use App\Ingreso;
use App\Proveedor;
use App\Comprobante;
use App\Articulo;
use App\IngresoArticulo;
use App\Tipo_Documento;
use App\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Collectioncollectstrtoupper;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ingreso = Ingreso::all();
        return view('ingreso/index',compact('ingreso'));
    }
    public function create()
    {
        $ingreso = Ingreso::all();
        $proveedor = Proveedor::all();
        $comprobante = Comprobante::all();
        $articulo = Articulo::all();
        $ingreso_articulo = IngresoArticulo::all();
        return view('ingreso/create', compact('ingreso','proveedor','comprobante','articulo','ingreso_articulo'));
    }

   
    public function store(Request $request)
    {
        $ingresoSave = new Ingreso();
        $ingresoSave->proveedor_id = request('proveedor_id');
        $ingresoSave->comprobante_id = request('comprobante_id');
        $ingresoSave->serie_ingreso= request('serie_ingreso');
        $ingresoSave->numero_ingreso = request('numero_ingreso');
        
        $ingresoSave->save();

        for ($i=0; $i <count($request->ingreso_articulo); $i++) {
            $articuloFind[$i] = Articulo::Where(['estado_id'=>1,'articulo_id'=>$request->ingreso_articulo[$i]])->first();
            $ingresoSave->articulos()->attach($articuloFind[$i]->articulo_id,
                                            [
                                            'cantidad' => $request->cantidad[$i],
                                            'precio_compra' => $request->precio_compra[$i],
                                            'precio_venta' => $request->precio_venta[$i],
                                            'total' => $request->cantidad[$i]* $request->precio_venta[$i],
                                            ],);
                                            
                                        }

         return redirect()->route('ingreso')->with('mensaje1',' Nuevo ingreso añadido');
    }
   
    public function show(Ingreso $ingreso)
    {
        //
    }

    
    public function edit(Ingreso $ingreso)
    {
        //
    }

    
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    
    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->delete();
        return redirect()->route('ingreso')->with('mensaje2','Ingreso Eliminado');
    }

    public function confirmado($id){
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->estado_id =3;
        $ingreso->save();
        return redirect()->route('ingreso');
    }
    public function anulado($id){
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->estado_id =4;
        $ingreso->save();
        return redirect()->route('ingreso');
    }
    public function reporte($id)
    { 
        $configuracion =Configuracion::all();
        $ingreso = Ingreso::where(['estado_id'=>3,'ingreso_id'=>$id])->first();
        $ingresoArticulo = IngresoArticulo::where('ingreso_id',$id)->get();
        $ingreso_articulo=IngresoArticulo::where('ingreso_id',$id)->get()->sum('total');
        $producto_total=IngresoArticulo::where('ingreso_id',$id)->get()->sum('cantidad');

        
        // return $ingreso_articulo;
        return view('ingreso/reporte',compact('ingreso_articulo','ingreso','ingresoArticulo','producto_total','configuracion'));
    }
  
    
    }
