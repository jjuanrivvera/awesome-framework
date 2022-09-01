<?php

/**
 * Index file using front controller design pattern
 * PHP version 7.2
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
$app->run();
