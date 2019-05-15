<?php

use Slim\App;

return function (App $app) {
    // e.g: $app->add(new \Slim\Csrf\Guard);
    /*
    $app ->add(function ($request, $response, $next) {
        $response->getBody()->write('BEFORE</br>');
        $response = $next($request, $response);
        $response->getBody()->write('AFTER');
        return $response;
    });
    */
};