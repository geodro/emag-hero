<?php

namespace Tests\Core;

use Core\Container;
use Core\Http\Request;
use Core\Http\Response;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    protected object $object;

    protected function setUp(): void
    {
        $this->object = new class {
            public function index(): Response
            {
                return Response::view('index');
            }

            public function request(Request $request): Response
            {
                return Response::view('index');
            }
        };

        parent::setUp();
    }

    public function testRequiresRequest(): void
    {
        $method = new \ReflectionMethod($this->object::class, 'request');

        $this->assertTrue(Container::requiresRequest($method));
    }

    public function testResolve(): void
    {
        ob_start();
        Container::resolve([$this->object::class, 'index']);
        $result = ob_get_clean();

        $this->assertIsString($result);

        ob_start();
        Container::resolve([$this->object::class, 'index']);
        $result = ob_get_clean();

        $this->assertIsString($result);

        $this->expectException(\ReflectionException::class);
        Container::resolve([$this->object::class, 'none']);
    }
}