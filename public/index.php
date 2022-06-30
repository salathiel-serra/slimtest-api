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
    
    $users = getUsers();

    $response->getBody()->write( json_encode($users) );
    return $response->withHeader('Content-type', 'application/json');
});

$app->get('/users/{id}', function (Request $request, Response $response, $args) {
    
    $users = getUsers();

    if (array_key_exists($args['id'], $users)) {

        $user[$args['id']] = $users[$args['id']];
        $user = json_encode($user);
    
    } else {
        $user = 'Usuário Inexistente!';
    }

    $response->getBody()->write($user);
    return $response->withHeader('Content-type', 'application/json');

    
});

function getUsers()
{
    return [
        '1' => 'João Silva',
        '2' => 'Maria Fernandes',
        '3' => 'Alice Pereira',
        '4' => 'Lucas Ximenes',
        '5' => 'Luis Santos'
    ];
}

$app->run();