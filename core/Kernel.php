<?php

namespace Core;

use Core\Http\HttpException;
use Core\Http\Router;

abstract class Kernel
{
    private static ?Kernel $instance = null;

    private Router $router;

    abstract function routesPath(): ?string;

    public function __construct()
    {
        set_exception_handler([HttpException::class, 'handler']);
        Session::start();
        $this->router = new Router($this->routesPath());
    }

    public static function instance(): Kernel
    {
        if (self::$instance == null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function run(): void
    {
        Container::resolve($this->router->current());
    }
}