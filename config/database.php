<?php

return [
    'driver' => env('DB_DRIVER', 'mysql'),
    'host' => env('DB_HOST', 'mysql'),
    'name' => env('DB_DATABASE', 'php-mvc-framework'),
    'username' => env('DB_USER', 'php-mvc-framework'),
    'password' => env('DB_PASSWORD'),
    'port' => env('DB_PORT', '3306'),
    'connectionString' => sprintf(
        '%s:host=%s;dbname=%s;port=%s;',
        // '%s:host=%s;dbname=%s;charset=utf8;port=%s;',
        env('DB_DRIVER', 'mysql'),
        env('DB_HOST', 'mysql'),
        env('DB_DATABASE', 'php-mvc-framework'),
        env('DB_PORT', '3306')
    )
];
