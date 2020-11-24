<?php
require '../html/vendor/autoload.php';
require './database.php';
Use App\models\Producto;
$modelProducto = new Producto();
echo json_encode($modelProducto::all());
