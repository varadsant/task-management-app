<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function resolve($uri, $method)
    {
        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            die('404 Not Found');
        }

        [$controller, $controllerMethod] = explode('@', $action);

        $controller = "App\\Controllers\\{$controller}";

        $controllerInstance = new $controller;

        return call_user_func(
            [$controllerInstance, $controllerMethod]
        );
    }
}