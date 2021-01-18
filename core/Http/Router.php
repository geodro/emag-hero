<?php

namespace Core\Http;

class Router
{
    private string $request;

    private array $routes = [];

    public function __construct(?string $routesPath)
    {
        $this->routes = Route::instance()->load($routesPath)->getAll();
        $this->request = Request::instance()->uri();
    }

    public function has(string $uri): bool
    {
        return array_key_exists($uri, $this->routes);
    }

    public function add(string $uri, callable|array $callback)
    {
        $this->routes[$uri] = $callback;
    }

    public function current(): callable|array
    {
        if (!$this->has($this->request)) {
            throw new HttpException('Route not found', 404);
        }

        return $this->routes[$this->request];
    }
}