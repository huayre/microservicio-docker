<?php
        require '../html/vendor/autoload.php';

        require './database.php';
        Use App\models\Producto;
        date_default_timezone_set('PRC');

    use Monolog\Logger;
    use Monolog\Handler\StdoutHandler;


// Create the logger
//$logger = new Logger('my_logger');
// Now add some handlers
//$logger->pushHandler(new StdoutHandler());

        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('kafka:29092');
        $config->setGroupId('stock');
        $config->setBrokerVersion('2.6.0');
        $config->setTopics(['stock']);
//$config->setOffsetReset('earliest');
        $consumer = new \Kafka\Consumer();
//$consumer->setLogger($logger);
        $consumer->start(function ($topic, $part, $message) {
            $objetoproducto=new Producto();
            $data=json_decode($message['message']['value']);
            if($data->operacion==1){
                $producto=$objetoproducto->find($data->id);
                $producto->decrement('stock',$data->cantidad);
            }
            if($data->operacion==2){
                $producto=$objetoproducto->find($data->id);
                $producto->increment('stock',$data->cantidad);
            }

            var_dump($message);
        });

