<?php
require '../html/vendor/autoload.php';
require './database.php';
Use App\models\Compra;
$modelCompra = new Compra();
echo json_encode($modelCompra::all());