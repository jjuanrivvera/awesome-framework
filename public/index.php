<?php

/**
 * Index file using front controller design pattern
 * @author Juan Felipe Rivera G
 */

/**
 * Composer autoloader
 */
require_once '../vendor/autoload.php';

/**
 * Creates application
 */
$app = require_once '../bootstrap/app.php';
$app->loadRepositories(
    dirname(__DIR__) . '/App/Contracts/*.php'
);
$app->init();
$app->run();
