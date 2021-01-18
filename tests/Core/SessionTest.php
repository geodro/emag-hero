<?php

namespace Tests\Core;

use Core\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    public function testStart(): void
    {
        $this->assertIsBool(Session::start());
    }

    public function testAll(): void
    {
        $testVal = 'test';

        Session::put('test', $testVal);

        $this->assertEquals($testVal, Session::get('test'));

        Session::delete('test');

        $this->assertNull(Session::get('test'));
    }
}