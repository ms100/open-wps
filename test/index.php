<?php

use Ms100\OpenWps\Config;
use Ms100\OpenWps\Manager;

include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php');
include(__DIR__ . '/WpsHandler.php');

$manager = new Manager(
    new Config(
        'wps_appid',
        'wps_appsecret'
    ),
    new WpsHandler()
);
$response = $manager->handleRequest($_SERVER['PATH_INFO']);

return json_encode($response);