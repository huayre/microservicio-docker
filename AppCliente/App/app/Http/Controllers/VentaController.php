<?php


namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VentaController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token=Http::get('appgateway/api/token');
        $this->token=str_replace('"','',$this->token);
    }

  public function listaventa()
  {
      $listaproductos=Http::withToken($this->token)->get('appgateway/api/listaproductos');
      $listaproductos=$listaproductos->object();
      $listaVentas=Http::withToken($this->token)->get('appgateway/api/ventas');
      $listaVentas=$listaVentas->object();
     return view('app.listaventa',compact('listaVentas','listaproductos'));
  }

  public function crearVenta(Request $request)
  {
      $data=['id'=>$request->id,'producto'=>$request->producto,'cantidad'=>$request->cantidad,'precio_unidad'=>$request->precio_unidad];

      Http::withToken($this->token)->dockerpost('appgateway/api/crearventa',$data);


    return redirect()->route('listaventa');
  }
}
