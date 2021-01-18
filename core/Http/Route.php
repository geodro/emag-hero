<?php

namespace Core\Http;

class Route
{
    private static ?Route $instance = null;

    private array $routes = [];

    public static function instance(): Route
    {
        if (self::$instance == null) {
            self::$instance = new Route();
        }

        return self::$instance;
    }

    public function load(?string $path = null): Route
    {
        if ($path) {
            if (!file_exists($path)) {
                throw new \Exception('Invalid routes path');
            }

            require_once($path);
        }

        return $this;
    }

    public static function add(string $uri, callable|array $callback): void
    {
        Route::instance()->addRoute($uri, $callback);
    }

    public function addRoute(string $uri, callable|array $callable): void
    {
        $this->routes[$uri] = $callable;
    }

    public static function is(string $uri): bool
    {
        return $uri == Request::instance()->uri();
    }

    public function getAll(): array
    {
        return $this->routes;
    }
}