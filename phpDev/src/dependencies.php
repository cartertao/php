<?php

use Slim\App;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Connectors\Connector;
//use databaseFactory;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['db'] = function ($c) {
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection($c['settings']['db']);//创建连接
        $capsule->setAsGlobal();    //设置全局静态可访问
        $capsule->bootEloquent();   //启动eloquent
        return $capsule;
    };
    $container['db1'] = function ($c) {
        $settings = $c -> get('settings')['db'];
        $connection = mysqli_connect($settings['host'],$settings['username'],$settings['password'],$settings['database']);
        $connection->query('set charset utf8');
        return $connection;
    };

    $container['path'] = function($c){
        $path = str_replace('\\','/',getcwd()); 
        return $path;
    };
};
