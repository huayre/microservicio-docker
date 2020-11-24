<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token=Http::get('appgateway/api/token');
        $this->token=str_replace('"','',$this->token);


    }


    public function listaProductos()
   {

       $listaproductos=Http::withToken($this->token)->get('appgateway/api/listaproductos');

       $listaproductos=$listaproductos->object();

       return view('app.listaproducto',compact('listaproductos'));
   }


   public function crearproducto(Request $request)
   {
       $data=['nombre'=>$request->nombre,'stock'=>$request->stock];

       $response= Http::withToken($this->token)->post('appgateway/api/crearproducto',$data);
       return redirect()->route('listaproducto');
   }
}
