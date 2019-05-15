<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        // Slim Settings
        'determineRouteBeforeAppMiddleware'=>false,
        'db'=>[
                'driver'=>'mysql',
                'host'=>'185.239.68.42',
                'database'=>'ameco',
                'username'=>'root',
                'password'=>'QWer12!@',
                'charset'=>'utf8',
                'collation'=>'utf8_unicode_ci',
                'prefix'=>'',
        ],
    ],
];
