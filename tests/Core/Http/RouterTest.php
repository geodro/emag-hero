<?php

namespace Tests\Core\Http;

use Core\Http\HttpException;
use Core\Http\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    protected Router $router;

    protected function setUp(): void
    {
        $this->router = new Router(null);
        parent::setUp();
    }

    public function testHas(): void
    {
        $router = $this->createMock(Router::class);

        $result = $router->has('test');

        $this->assertFalse($result);

        $this->router->add('test', []);

        $result = $this->router->has('test');

        $this->assertTrue($result);
    }

    public function testCurrent(): void
    {
        $this->expectException(HttpException::class);
        $this->router->current();
    }
}