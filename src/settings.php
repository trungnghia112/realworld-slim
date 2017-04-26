<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Database settings
        'db' => [
            'driver'    => getenv('DBTYPE') ?: 'mysql',
            'host'      => getenv('DBHOST') ?: 'localhost',
            'database'  => getenv('DBNAME') ?: 'realworld',
            'username'  => getenv('DBUSER') ?: 'realworld',
            'password'  => getenv('DBPASS') ?: 'realworld',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
