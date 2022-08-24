<?php

namespace Core;

use PDO;

/**
 * Base Model
 * @package Core
 */
abstract class Model
{
    /**
     * Get the PDO database connection
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            try {
                $db = new PDO(
                    sprintf('mysql:host=%s;dbname=%s;charset=utf8', $_ENV['DB_HOST'], $_ENV['DB_DATABASE']),
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS']
                );
            } catch (\PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        return $db;
    }
}
