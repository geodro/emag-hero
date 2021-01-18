<?php

namespace App\Entities;

use App\Actions\Attacks;
use App\Actions\Defends;

abstract class Creature implements Attacks, Defends
{
    protected int $initHealth;
    protected int $health;
    protected int $strength;
    protected int $defence;
    protected int $speed;
    protected int $luck;

    public function __construct(int $initHealth, int $health, int $strength, int $defence, int $speed, int $luck)
    {
        $this->initHealth = $initHealth;
        $this->health = $health;
        $this->strength = $strength;
        $this->defence = $defence;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    public function getName(): string
    {
        $path = explode('\\', static::class);
        return array_pop($path);
    }

    public function getInitHealth(): int
    {
        return $this->initHealth;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getHealthPercent(): int
    {
        return $this->health * 100 / $this->initHealth;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }

    public function toArray(): array
    {
        return [
            'initHealth' => $this->initHealth,
            'health' => $this->health,
            'strength' => $this->strength,
            'defence' => $this->defence,
            'speed' => $this->speed,
            'luck' => $this->luck
        ];
    }
}