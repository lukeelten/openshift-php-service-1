<?php
// DIC configuration

$container = $app->getContainer();


$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];


    $dsn = "mysql:host=" . $settings['host'] . ";dbname=" . $settings['db'];
    $pdo = new PDO($dsn, $settings['user'], $settings['password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]);

    return $pdo;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
