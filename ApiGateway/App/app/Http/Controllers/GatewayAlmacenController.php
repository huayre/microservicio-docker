<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayAlmacenController extends Controller
{
    public function __construct()
    {
    }

    public function productos()
    {
        $listaproductos=Http::get('appalmacen/endpointproductos.php');
        $listaproductos=$listaproductos->object();
        return response()->json($listaproductos);
    }
    public function crearproducto(Request $request)
    {
        $data=['nombre'=>$request->nombre,'stock'=>$request->stock];

        Http::post('appalmacen/crearproductos.php',$data);
    }

}
