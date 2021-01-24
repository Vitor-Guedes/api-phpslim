<?php

$app->get('/{listName}', function ($request, $response, $args) use ($makeRequest) {
    $listName = $args['listName'] ?? 'list_customers1';
    $file = dirname(__DIR__) . "/mocks/$listName.json";
    $list = file_get_contents($file);
    $response->getBody()->write($list);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/', function ($request, $response) {
    $file = dirname(__DIR__) . "/view/index.phtml";
    $html = file_get_contents($file);
    $response->getBody()->write($html);

    return $response;
});

$app->group('/api/customers', function ($app) {
    $controller = \Api\Controller\Customer::class;
    
    $app->get('', "$controller:get");

    $app->get('/{id}', "$controller:getOne");

    $app->post('', "$controller:store");

    $app->put('/{id}', "$controller:update");

    $app->delete('/{id}', "$controller:delete");
})->add(new \Api\Middleware\ApiResponse());