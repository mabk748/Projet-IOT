<?php
$server   = '192.168.43.59';
$port     = 1883;
$clientId = 'php_sql';

$mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $clientId);
$mqtt->connect();
$mqtt->subscribe('php-mqtt/client/test', function ($topic, $message, $retained, $matchedWildcards) {
    echo sprintf("Received message on topic [%s]: %s\n", $topic, $message);
}, 0);
$mqtt->loop(true);
$mqtt->disconnect();
