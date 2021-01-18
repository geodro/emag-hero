<?php

namespace Tests\Core;

use Core\View;
use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    public function testRender(): void
    {
        $this->assertIsString(View::render('index'));
    }

    public function testPartial(): void
    {
        $this->assertIsString(View::partial('index'));
    }

    public function testError(): void
    {
        $message = 'Error message';
        $this->assertStringContainsString($message, View::error($message));
    }
}