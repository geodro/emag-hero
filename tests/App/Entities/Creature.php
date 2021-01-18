<?php

namespace Tests\App\Entities;

use PHPUnit\Framework\TestCase;

abstract class Creature extends TestCase
{
    abstract protected function getCreatureName(): string;

    abstract protected function getCreatureClass(): string;

    protected function newCreature(string $creatureClass): \App\Entities\Creature
    {
        return new $creatureClass(
            initHealth: 90,
            health: 60,
            strength: 60,
            defence: 40,
            speed: 40,
            luck: 25
        );
    }

    protected function testedCreature(): \App\Entities\Creature
    {
        return static::newCreature(static::getCreatureClass());
    }

    public function testGetName(): void
    {
        $this->assertEquals(static::getCreatureName(), $this->testedCreature()->getName());
    }

    public function testGetHealthPercent(): void
    {
        $this->assertEquals(66, $this->testedCreature()->getHealthPercent());
    }

    public function testToArray(): void
    {
        $this->assertIsArray($this->testedCreature()->toArray());
    }
}