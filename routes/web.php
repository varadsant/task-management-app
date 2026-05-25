<?php

use App\Core\Router;
$router = new Router();

$router->get('/', 'HomeController@index');


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo "URI : ".$uri; echo "<br>";
$method = $_SERVER['REQUEST_METHOD'];
// echo "Method : ".$method;

$router->resolve($uri, $method);