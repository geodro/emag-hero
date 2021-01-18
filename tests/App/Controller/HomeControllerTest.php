<?php

namespace Tests\App\Controller;

use App\Controller\HomeController;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $controller = new HomeController();

        $this->assertInstanceOf(Response::class, $controller->index());
    }

    public function testStart(): void
    {
        $controller = new HomeController();

        Session::delete('game');

        $this->assertInstanceOf(Response::class, $controller->start());

        $this->assertNotNull(Session::get('game'));
    }

    public function testBattle(): void
    {
        $controller = new HomeController();
        $request = Request::instance();

        $this->assertInstanceOf(Response::class, $controller->battle($request));
    }
}