<?php
        require '../html/vendor/autoload.php';

        Use App\models\Producto;
        date_default_timezone_set('PRC');



// Create the logger
//$logger = new Logger('my_logger');
// Now add some handlers
//$logger->pushHandler(new StdoutHandler());

        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('kafka:29092');
        $config->setGroupId('test');
        $config->setBrokerVersion('2.6.0');
        $config->setTopics(['test']);
//$config->setOffsetReset('earliest');
        $consumer = new \Kafka\Consumer();
//$consumer->setLogger($logger);
        $consumer->start(function ($topic, $part, $message) {
            var_dump($message);
        });

