<?php
require '../html/vendor/autoload.php';
require './database.php';
Use App\models\Venta;
$modelVenta = new Venta();
echo json_encode($modelVenta::all());