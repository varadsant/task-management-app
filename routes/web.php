<?php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\TaskController;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/create', 'TaskController@create');
$router->post('/tasks/store', 'TaskController@store');

$router->get('/tasks/edit', 'TaskController@edit');
$router->post('/tasks/update', 'TaskController@update');
$router->get('/tasks/delete', 'TaskController@delete');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo "URI : ".$uri; echo "<br>";
$method = $_SERVER['REQUEST_METHOD'];
// echo "Method : ".$method;

$router->resolve($uri, $method);