<?php

if (is_file(__DIR__ . '/.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
}

return [
    'paths' => [
        'migrations' => __DIR__ . '/database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default' => [
            'adapter' => 'mysql',
            'host' => getenv('DBHOST'),
            'name' => getenv('DBNAME'),
            'user' => getenv('DBUSER'),
            'pass' => getenv('DBPASS'),
            'port' => getenv('DBPORT'),
        ]
    ]
];
