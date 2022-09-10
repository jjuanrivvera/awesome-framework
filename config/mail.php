<?php

return [
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'port' => env('MAIL_PORT', 465),
    'from' => env('MAIL_FROM_ADDRESS'),
];
