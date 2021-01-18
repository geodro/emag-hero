<?php

namespace Tests\App\Entities;

use App\Entities\Beast;
use App\Entities\Fight;
use App\Entities\Orderus;

class OrderusTest extends Creature
{
    protected function getCreatureName(): string
    {
        return 'Orderus';
    }

    protected function getCreatureClass(): string
    {
        return Orderus::class;
    }

    public function testDefend(): void
    {
        $orderus = $this->testedCreature();

        $result = $orderus->defend(60);

        if (!is_null($result) && $result->getDefence() != 'shield') {
            $this->assertInstanceOf(Fight::class, $result);
            $this->assertEquals(50, $orderus->getHealth());
            $this->assertEquals('magic shield', $result->getDefence());
        } else {
            $this->testDefend();
        }
    }

    public function testAttack(): void
    {
        $orderus = $this->testedCreature();
        $beast = $this->newCreature(Beast::class);

        $result = $orderus->attack($beast);

        if (!is_null($result)) {
            $this->assertInstanceOf(Fight::class, $result);
            $this->assertEquals(40, $beast->getHealth());
            if ($result->isDoubleAttack()) {
                $this->assertEquals('rapid strike', $result->getAttack());
            } else {
                $this->assertEquals('strikes', $result->getAttack());
            }
        } else {
            $this->testAttack();
        }
    }
}