<?php

use Awesome\App;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$app = new App();

return $app;
