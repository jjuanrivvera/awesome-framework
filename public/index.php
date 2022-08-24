<?php

/**
 * Front Controller
 */

/**
 * Composer autoloader
 */
require_once '../vendor/autoload.php';

/**
 * Dot env
 */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

/**
 * Auto loader
 */
// spl_autoload_register(function ($class) {
//     $root = dirname(__DIR__); // get the parent directory
//     $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
//     if (is_readable($file)) {
//         require $root . '/' . str_replace('\\', '/', $class) . '.php';
//     }
// });

/**
 * Error and exception handler
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'PostsController', 'action' => 'index']);
$router->add('posts/add', ['controller' => 'PostsController', 'action' => 'add']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');

/*
// Display the routing table
echo '<pre>';
//var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

// Match the requested route
$url = $_SERVER['QUERY_STRING'];
$url = str_replace('url=', '', $url);

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}
*/

$router->dispatch(str_replace('url=', '', $_SERVER['QUERY_STRING']));
