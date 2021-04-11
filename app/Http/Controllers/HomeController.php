<?php

namespace App\Http\Controllers;
use App\Articulo;
use App\Ingreso;
use App\Cliente;
use App\Proveedor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_articulo= count(Articulo::where(['estado_id'=>1])->get());
        $count_ingreso = count(Ingreso::where(['estado_id'=>1])->get());
        $count_cliente = count(Cliente::where(['estado_id'=>1])->get());
        $count_proveedor = count(Proveedor ::where(['estado_id'=>1])->get());
        return view('home', compact('count_articulo','count_ingreso','count_cliente','count_proveedor'));
    }
}
