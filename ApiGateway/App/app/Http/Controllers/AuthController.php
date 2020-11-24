<?php


namespace App\Http\Controllers;


use App\Models\User;

class AuthController extends Controller
{
 public function Token()
 {
     $user =User::find(1);
     // Creating a token without scopes...
     $token = $user->createToken('Token Name')->accessToken;

     return  response()->json($token);
 }
}
