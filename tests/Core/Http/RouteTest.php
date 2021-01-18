<?php

namespace Tests\Core\Http;

use Core\Http\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Route::class, Route::instance());
    }

    public function testLoad(): void
    {
        $this->expectException(\Exception::class);
        Route::instance()->load('invalid-path');
    }

    public function testGetAll(): void
    {
        $route = Route::instance();

        $route->addRoute('test', []);

        $routes = $route->getAll();

        $this->assertIsArray($routes);
    }

    public function testAddRoute(): void
    {
        $route = Route::instance();

        $route->addRoute('test', []);

        $routes = $route->getAll();

        $this->assertArrayHasKey('test', $routes);
    }

    public function testAdd(): void
    {
        $route = Route::instance();

        Route::add('test', []);

        $routes = $route->getAll();

        $this->assertArrayHasKey('test', $routes);
    }
}