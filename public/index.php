<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("API Running...");
    return $response;
});

$app->get('/users', function (Request $request, Response $response, $args) {
    
    $users = [
        '1' => 'João Silva',
        '2' => 'Maria Fernandes',
        '3' => 'Alice Pereira',
        '4' => 'Lucas Ximenes',
        '5' => 'Luis Santos'
    ];

    $response->getBody()->write( json_encode($users) );
    return $response->withHeader('Content-type', 'application/json');
});

$app->run();