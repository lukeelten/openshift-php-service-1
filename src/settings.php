<?php
return [
    'settings' => [
        'prettyPrint' => true,

        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header


        // Monolog settings
        'logger' => [
            'name' => 'service-1',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'db' => [
            'host' => getenv('DB_HOST') ?? '127.0.0.1',
            'user' => getenv('DB_USER') ?? '',
            'password' => getenv('DB_PASSWORD') ?? '',
            'db' => getenv('DB_NAME') ?? ''
        ]
    ],
];
