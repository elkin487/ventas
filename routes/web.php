<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Cliente
Route::get('cliente/index', 'ClienteController@index')->name('cliente/index');
Route::get('cliente/create', 'ClienteController@create')->name('cliente/create');
Route::post('cliente/store', 'ClienteController@store')->name('cliente/store');
Route::delete('cliente/destroy{id}', 'ClienteController@destroy')->name('ciente/destroy');
Route::put('cliente/desactivar{id}', 'ClienteController@desactivar')->name('cliente/desactivar');
Route::put('cliente/activar{id}', 'ClienteController@activar')->name('cliente/activar');
Route::get('cliente/edit/{id}', 'ClienteController@edit')->name('cliente/edit');
Route::put('cliente/update/{id}', 'ClienteController@update')->name('cliente/update');
//Articulo
route::get('articulo','ArticuloController@index')->name('articulo');
Route::get('articulo/create', 'ArticuloController@create')->name('articulo/create');
route::post('articulo/store', 'ArticuloController@store')->name('articulo/store');
Route::delete('articulo/destroy/{id}', 'ArticuloController@destroy')->name('articulo/destroy');
route::put('articulo/desactivar/{id}', 'ArticuloController@desactivar')->name('articulo/desactivar');
route::put('articulo/activar/{id}', 'ArticuloController@activar')->name('articulo/activar');
Route::put('articulo/update/{id}', 'ArticuloController@update')->name('articulo/update');
Route::get('articulo/edit/{id}', 'ArticuloController@edit')->name('articulo/edit');

//Categoria
Route::get('categoria', 'CategoriaController@index')->name('categoria');
route::delete('categoria/destroy/{id}', 'CategoriaController@destroy')->name('categoria/destroy');
route::post('categoria/store','CategoriaController@store')->name('categoria/store');

//Ingresos
Route::get('ingreso', 'IngresoController@index')->name('ingreso');
Route::get('ingreso/create', 'IngresoController@create')->name('ingreso/create');
Route::post('ingreso/store', 'IngresoController@store')->name('ingreso/store');
Route::put('ingreso/confirmado{id}', 'IngresoController@confirmado')->name('ingreso/confirmado');
Route::put('ingreso/anulado/{id}', 'IngresoController@anulado')->name('ingreso/anulado');
Route::delete('ingreso/destroy/{id}', 'IngresoController@destroy')->name('ingreso/destroy');
route::get('ingreso/reporte/{id}','IngresoController@reporte')->name('ingreso/reporte');

//Proveedores
Route::get('proveedor/index', 'ProveedorController@index')->name('proveedor/index');
Route::get('proveedor/create', 'ProveedorController@create')->name('proveedor/create');
Route::post('proveedor/store', 'ProveedorController@store')->name('proveedor/store');
Route::put('proveedor/desactivar/{id}', 'ProveedorController@desactivar')->name('proveedor/desactivar');
Route::put('proveedor/activar/{id}', 'ProveedorController@activar')->name('proveedor/activar');
Route::delete('proveedor/destroy/{id}', 'ProveedorController@destroy')->name('proveedor/destroy');
Route::get('proveedor/edit/{id}', 'ProveedorController@edit')->name('proveedor/edit');
Route::put('proveedor/update/{id}', 'ProveedorController@update')->name('proveedor/update');



// usuarios
Route::get('user/index', 'UserController@index')->name('user/index');
Route::get('user/create', 'UserController@create')->name('user/create');
Route::post('user/store', 'UserController@store')->name('user/store');
Route::put('user/desactivar/{id}', 'UserController@desactivar')->name('user/desactivar');
Route::put('user/activar/{id}', 'UserController@activar')->name('user/activar');
Route::delete('user/destroy/{id}', 'UserController@destroy')->name('user/destroy');

//Ventas
route::get('venta/index', 'VentaController@index')->name('venta/index');
Route::get('venta/create','VentaController@create')->name('venta/create');
Route::post('venta/store', 'VentaController@store')->name('venta/store');

//Configuraciones
Route::get('configuracion', 'ConfiguracionController@index')->name('configuracion');
Route::get('configuracion/create', 'ConfiguracionController@create')->name('configuracion/create');
route::post('configuracion/store', 'ConfiguracionController@store')->name('configuracion/store');
route::delete('configuracion/destroy/{id}','ConfiguracionController@destroy')->name('configuracion/destroy');
route::get('configuracion/edit/{id}', 'ConfiguracionController@edit')->name('configuracion/edit');
route::put('configuracion/update/{id}', 'ConfiguracionController@update')->name('configuracion/update');