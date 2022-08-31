<?php

/**
 * App
 * @package Core
 * @author  Juan Felipe Rivera G
 */

namespace Core;

use DI\Container;

class App
{
    /**
     * @var Container
     */
    protected static $container;

    /**
     * @var Router
     */
    protected static $router;
    
    /**
     * App Constructor
     */
    public function __construct()
    {
        self::$container = new Container();
    }

    /**
     * Get container instance
     * @return Container
     */
    public static function getContainer()
    {
        return self::$container;
    }

    public static function loadRoutes()
    {
        // include files from the routes directory
        $files = glob(__DIR__ . '/../routes/*.php');

        foreach ($files as $file) {
            require $file;
        }
    }

    public function loadErrorAndExceptionHandler()
    {
        error_reporting(E_ALL);
        set_error_handler('Core\Error::errorHandler');
        set_exception_handler('Core\Error::exceptionHandler');
    }

    /**
     * Runs the application
     * @return void
     */
    public static function run()
    {
        self::$router = self::$container->get(Router::class);
        self::$router->dispatch(str_replace('url=', '', $_SERVER['QUERY_STRING']));
    }
}
