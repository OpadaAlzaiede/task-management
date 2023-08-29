<?php


namespace core;


use core\middlewares\Auth;
use core\middlewares\Guest;
use core\middlewares\Middleware;

class Router
{

    protected $routes = [];

    public function route($uri, $method) {

        foreach ($this->routes as $route) {

            if($route['uri'] === $uri && $route['method'] === strtoupper($method))
            {
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    public function get($uri, $controller) {

        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {

        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller) {

        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller) {

        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller) {

        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key) {

        $this->routes[count($this->routes) - 1]['middleware'] = $key;

        return $this;
    }

    protected function abort($status = 404) {

        http_response_code($status);

        require base_path("views/{$status}.php");

        die();
    }

    protected function add($method, $uri, $controller) {

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

}
