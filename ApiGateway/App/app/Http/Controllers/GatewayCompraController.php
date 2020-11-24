<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayCompraController extends Controller
{
    public function listaCompras(){
        $listacompras=Http::get('appcompras/endpointlistacompras.php');
        $listacompras=$listacompras->object();
        return response()->json($listacompras);
    }
    public function crearcompra(Request $request)
    {
        $data=['id'=>$request->id,'producto'=>$request->producto,'cantidad'=>$request->cantidad,'precio_unidad'=>$request->precio_unidad];
        Http::post('appcompras/crearcompra.php',$data);
    }


}
