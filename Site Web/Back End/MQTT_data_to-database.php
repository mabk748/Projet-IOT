<?php
require('vendor/autoload.php');

use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;

$server   = '192.168.43.59';
$port     = 1883;
$clientId = 'php_sql';
$mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $clientId);
$mqtt->connect();
$mqtt->subscribe('home/+', function ($topic, $message, $retained, $matchedWi>
{
    echo sprintf("Received message on topic [%s]: %s\n", $topic, $message);}>
$mqtt->loop(true);
$mqtt->disconnect();

