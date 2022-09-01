<?php

/**
 * App
 * @package Core
 * @author  Juan Felipe Rivera G
 */

namespace Core;

use DI\Container;
use DI\ContainerBuilder;
use Exception;

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
        $container = new Container();

        $env = getenv('APP_ENV') ?: 'production';

        if ($env === 'production') {
            $builder = new ContainerBuilder();
            $builder->enableCompilation(dirname(__DIR__) . '/tmp');
            $builder->writeProxiesToFile(true, dirname(__DIR__) . '/tmp/proxies');
            $container = $builder->build();
        }

        self::$container = $container;
    }

    /**
     * Get container instance
     * @return Container
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * Load routes
     * @return void
     */
    public static function loadRoutes()
    {
        $files = glob(__DIR__ . '/../routes/*.php');

        foreach ($files as $file) {
            require $file;
        }
    }

    /**
     * Load error and exception handler
     * @return void
     */
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
    public static function initializeRouter()
    {
        self::$router = self::$container->get(Router::class);
        self::$router->dispatch(str_replace('url=', '', $_SERVER['QUERY_STRING']));
    }

    /**
     * Load repositories
     */
    public static function loadRepositories()
    {
        // get all contracts files
        $files = glob(dirname(__DIR__) . '/App/Contracts/*.php');

        // bind each contract to its repository
        foreach ($files as $file) {
            $class = basename($file, '.php');
            $contract = 'App\Contracts\\' . $class;
            $repository = 'App\Repositories\\' . str_replace('Contract', 'Repository', $class);
            
            try {
                $repositoryClass = self::$container->get($repository);
                self::$container->set($contract, $repositoryClass);
            } catch (\Exception $th) {
                throw new Exception('Error loading repository for ' . $class);
            }
        }
    }

    /**
     * Runs the application
     * @return void
     */
    public function run()
    {
        self::loadErrorAndExceptionHandler();
        self::loadRoutes();
        self::loadRepositories();
        self::initializeRouter();
    }
}
