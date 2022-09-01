<?php

return [
    'driver' => env('DB_DRIVER', 'mysql'),
    'dbHost' => env('DB_HOST', 'mysql'),
    'dbName' => env('DB_DATABASE', 'php-mvc-framework'),
    'dbUser' => env('DB_USER', 'php-mvc-framework'),
    'dbPassword' => env('DB_PASSWORD'),
    'dbPort' => env('DB_PORT', '3306'),
    'connectionString' => sprintf(
        '%s:host=%s;dbname=%s;port=%s;',
        // '%s:host=%s;dbname=%s;charset=utf8;port=%s;',
        env('DB_DRIVER', 'mysql'),
        env('DB_HOST', 'mysql'),
        env('DB_DATABASE', 'php-mvc-framework'),
        env('DB_PORT', '3306')
    ),
];
