<?php

use Awesome\App;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$app = new App(
    configPath: dirname(__DIR__) . '/config/*.php',
    routesPath: dirname(__DIR__) . '/routes/*.php',
    viewPath: '../App/Views',
    isCli: false
);

return $app;
