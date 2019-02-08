<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Tuupola\Middleware\CorsMiddleware;

require '../vendor/autoload.php';

require '../src/config/db.php';

$app = new \Slim\App;

$app->add(new Tuupola\Middleware\CorsMiddleware);

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

//customer routes
require '../src/routes/customers.php';

$app->run();