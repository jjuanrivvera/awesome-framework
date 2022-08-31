<?php

namespace Core;

use PDO;

class Database
{
    /**
     * Connection
     */
    public $connection;

    /**
     * Database constructor
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Connect to the database
     */
    public function connect()
    {
        try {
            $this->connection = new PDO(
                $this->config->generateDatabaseConnectionString(),
                $this->config->getDbUser(),
                $this->config->getDbPassword()
            );
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
