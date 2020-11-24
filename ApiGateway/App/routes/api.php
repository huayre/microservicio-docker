<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GatewayVentaController;
use App\Http\Controllers\GatewayAlmacenController;
use App\Http\Controllers\GatewayCompraController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('token', [AuthController::class, 'Token'])->name('token');

Route::group(['middleware' => 'auth:api'], function(){
//venta
    Route::get('ventas', [GatewayVentaController::class, 'listaVentas'])->name('listaventas');
    Route::post('crearventa', [GatewayVentaController::class, 'crearventa'])->name('crearventa');
//compra
    Route::get('compra', [GatewayCompraController::class, 'listaCompras'])->name('compra');
    Route::post('crearcompra', [GatewayCompraController::class, 'crearcompra'])->name('crearcompra');
//productos
    Route::get('listaproductos', [GatewayAlmacenController::class, 'productos'])->name('listaproductos');
    Route::post('crearproducto', [GatewayAlmacenController::class, 'crearproducto'])->name('crearproducto');
});
