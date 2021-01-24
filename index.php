<?php

include_once "vendor/autoload.php";

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$container = new \DI\Container();

include_once "config/services.php";


AppFactory::setContainer($container);

$app = AppFactory::create();

include_once "config/routes.php";

include_once "config/middlewares.php";

$app->run();