<?php

namespace Tests\App\Entities;

use App\Entities\Beast;
use App\Entities\Fight;
use App\Entities\Orderus;

class BeastTest extends Creature
{
    protected function getCreatureName(): string
    {
        return 'Beast';
    }

    protected function getCreatureClass(): string
    {
        return Beast::class;
    }

    public function testDefend(): void
    {
        $beast = $this->testedCreature();

        $result = $beast->defend(60);

        if ($result) {
            $this->assertInstanceOf(Fight::class, $result);
            $this->assertEquals(40, $beast->getHealth());
            $this->assertEquals('shield', $result->getDefence());
        } else {
            $this->testDefend();
        }
    }

    public function testAttack(): void
    {
        $beast = $this->testedCreature();
        $orderus = $this->newCreature(Orderus::class);

        $result = $beast->attack($orderus);

        if ($result) {
            $this->assertInstanceOf(Fight::class, $result);
            if ($result->getDefence() == 'magic shield') {
                $this->assertEquals(50, $orderus->getHealth());
            } else {
                $this->assertEquals(40, $orderus->getHealth());
            }
            $this->assertEquals('strikes', $result->getAttack());
        } else {
            $this->testAttack();
        }
    }
}