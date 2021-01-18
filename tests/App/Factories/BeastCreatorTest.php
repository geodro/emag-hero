<?php

namespace Tests\App\Factories;

use App\Entities\Beast;
use App\Factories\BeastCreator;
use PHPUnit\Framework\TestCase;

class BeastCreatorTest extends TestCase
{
    public function testNew(): void
    {
        $this->assertInstanceOf(Beast::class, BeastCreator::new());
    }

    public function testHydrate(): void
    {
        $this->assertInstanceOf(Beast::class, BeastCreator::hydrate([
            'initHealth' => 90,
            'health' => 60,
            'strength' => 60,
            'defence' => 40,
            'speed' => 40,
            'luck' => 25
        ]));
    }
}