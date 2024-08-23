<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

return [
    'database' => [
        'host' => $_ENV['DATABASE_HOST'],
        'port' => $_ENV['DATABASE_PORT'],
        'dbname' => $_ENV['DATABASE_NAME'],
        'charset' => $_ENV['DATABASE_CHARSET'],
    ],
    'user' => [
        'username' => $_ENV['DATABASE_USERNAME'],
        'password' => $_ENV['DATABASE_PASSWORD'],
    ],
];
