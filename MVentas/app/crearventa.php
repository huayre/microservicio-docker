<?php

require '../html/vendor/autoload.php';
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './database.php';
Use App\models\Venta;
$modelVenta = new Venta();
$data=file_get_contents("php://input");
$data=json_decode($data,true);
$producto=$data['producto'];
$cantidad=$data['cantidad'];
$precio_unidad=$data['precio_unidad'];
$ventaTotal=$cantidad*$precio_unidad;
//

//
$modelVenta->create([
    'producto'      =>$producto,
    'cantidad'      =>$cantidad,
    'precio_unidad'  =>$precio_unidad,
    'venta_total'   =>$ventaTotal
]);

$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('kafka:29092');
$config->setBrokerVersion('2.6.0');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);
$producer = new \Kafka\Producer(
    function() {
        $data=file_get_contents("php://input");
        $data=json_decode($data,true);
         $id=$data['id'];
        $cantidad=$data['cantidad'];

        $datos=['id'=>$id,'cantidad'=>$cantidad,'operacion'=>1];
        return [
            [
                'topic' => 'stock',
                'value' => json_encode($datos),
                'key' => 'testkey',
            ],
        ];
    }
);

//$producer->setLogger($logger);
$producer->success(function($result) {
    var_dump($result);
});
$producer->error(function($errorCode) {
    var_dump($errorCode);
});
$producer->send(true);