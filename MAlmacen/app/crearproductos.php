<?php

require '../html/vendor/autoload.php';
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './database.php';
Use App\models\Producto;
$modelProducto = new Producto();
$data=file_get_contents("php://input");
$data=json_decode($data,true);
$nombre=$data['nombre'];
$stock=$data['stock'];

$modelProducto->create([
    'nombre'      =>$nombre,
    'stock'      =>$stock
]);