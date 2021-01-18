<?php

namespace Tests\App\Services;

use App\Factories\BeastCreator;
use App\Factories\OrderusCreator;
use App\Services\Narrator;
use PHPUnit\Framework\TestCase;

class NarratorTest extends TestCase
{
    public function testFight(): void
    {
        $orderus = OrderusCreator::new();
        $beast = BeastCreator::new();

        $result = $orderus->attack($beast);

        while (is_null($result)) {
            $result = $orderus->attack($beast);
        }

        $this->assertIsString(Narrator::fight($orderus, $beast, $result));
    }

    public function testCreatureWin(): void
    {
        $this->assertIsString(Narrator::creatureWin(OrderusCreator::new()));
    }

    public function testDraw(): void
    {
        $this->assertIsString(Narrator::draw());
    }
}