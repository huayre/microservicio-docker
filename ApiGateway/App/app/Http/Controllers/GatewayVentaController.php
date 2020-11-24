<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayVentaController extends Controller
{
  public function listaVentas()
  {
      $listaventas=Http::get('appventas/endpointlistaventas.php');
      $listaventas=$listaventas->object();
      return response()->json($listaventas);
  }

  public function crearventa(Request $request){
      $data=['id'=>$request->id,'producto'=>$request->producto,'cantidad'=>$request->cantidad,'precio_unidad'=>$request->precio_unidad];
      Http::post('appventas/crearventa.php',$data);
  }
}
