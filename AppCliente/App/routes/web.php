<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
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
    return view('app.inicio');
});

Route::get('listaproducto',[ProductoController::class,'listaProductos'])->name('listaproducto');
Route::post('crearproducto',[ProductoController::class,'crearproducto'])->name('crearproducto');


Route::get('listaventa',[VentaController::class,'listaventa'])->name('listaventa');
Route::post('crearventa',[VentaController::class,'crearVenta'])->name('crearventa');

Route::get('listacompra',[CompraController::class,'listacompra'])->name('listacompra');
Route::post('crearcompra',[CompraController::class,'crearcompra'])->name('crearcompra');
