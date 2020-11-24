<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompraController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token=Http::get('appgateway/api/token');
        $this->token=str_replace('"','',$this->token);
    }

    public function listacompra()
    {
        $listaproductos=Http::withToken($this->token)->get('appgateway/api/listaproductos');
        $listaproductos=$listaproductos->object();
        $listaCompras=Http::withToken($this->token)->get('appgateway/api/compra');
        $listaCompras=$listaCompras->object();
        return view('app.listacompra',compact('listaCompras','listaproductos'));
    }

    public function crearcompra(Request $request)
    {
        $data=['id'=>$request->id,'producto'=>$request->producto,'cantidad'=>$request->cantidad,'precio_unidad'=>$request->precio_unidad];
        Http::withToken($this->token)->post('appgateway/api/crearcompra',$data);
        return redirect()->route('listacompra');
    }

}
