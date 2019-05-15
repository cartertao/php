<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();
    $path = $container->get('path');
    require_once $path ."/public/include/result.php";
    require_once $path ."/public/include/middle.php";

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        return $response ->withRedirect("search/searchMain.php");
    });
    $app->get('/search/searchMain.php', function (Request $request, Response $response, array $args) use ($container) {
        return $response ->withRedirect("search/searchMain.php");
    });

    $app->get('/hello2/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        $container->get('logger')->info("Slim-Skeleton '/' route");
        require $container->get('path') .'/src/controller/orderController.php';
        $orderController = new orderController($container);
        $result = $orderController->orderSelectOne();
        
        $args['name1']=$result;
        $args['mm']=array('name'=>'taoahiwei','age'=>'80');
        return $container->get('renderer')->render($response, 'index.phtml', $args);//实际上返回的是参数$response
    });

    $app->post('/mainSearch/singleTable', function (Request $request, Response $response, array $args) use ($container) {
        require $container->get('path') ."/src/mainSearch/tableSearch/searchService.php";
        $controller = new select($container);
        $resultArray = $controller->selectSingleTable($request,null);
        $newResponse = $response->withJson($resultArray,201);
        return $newResponse;
    })->add($mainSearchSingleTable);

    $app->post('/mainSearch/moreTable/2catalogpnlist', function (Request $request, Response $response, array $args) use ($container) {
        require $container->get('path') ."/src/mainSearch/tableSearch/searchService.php";
        $controller = new select($container);
        $resultArray = $controller->selectMoreTableCatalogpnlist($request,null);
        $newResponse = $response->withJson($resultArray,201);
        return $newResponse;
    })->add($mainSearchSingleTable);
};
