<?php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');

$router->get('/logout', 'AuthController@logout');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo "URI : ".$uri; echo "<br>";
$method = $_SERVER['REQUEST_METHOD'];
// echo "Method : ".$method;

$router->resolve($uri, $method);