<?php

namespace Tests\App\Factories;

use App\Entities\Orderus;
use App\Factories\OrderusCreator;
use PHPUnit\Framework\TestCase;

class OrderusCreatorTest extends TestCase
{
    public function testNew(): void
    {
        $this->assertInstanceOf(Orderus::class, OrderusCreator::new());
    }

    public function testHydrate(): void
    {
        $this->assertInstanceOf(Orderus::class, OrderusCreator::hydrate([
            'initHealth' => 90,
            'health' => 60,
            'strength' => 60,
            'defence' => 40,
            'speed' => 40,
            'luck' => 25
        ]));
    }
}