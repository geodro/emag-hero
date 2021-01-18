<?php

namespace App\Entities;

class Fight
{
    private string $attack;
    private string $defence;
    private bool $doubleAttack = false;
    private ?int $damage;

    public function __construct(string $defence, int|null $damage)
    {
        $this->defence = $defence;
        $this->damage = $damage;
    }

    public function setAttack(string $attack): Fight
    {
        $this->attack = $attack;
        return $this;
    }

    public function setDefence(string $defence): Fight
    {
        $this->defence = $defence;
        return $this;
    }

    public function getAttack(): string
    {
        return $this->attack;
    }

    public function getDefence(): string
    {
        return $this->defence;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDoubleAttack(bool $doubleAttack): Fight
    {
        $this->doubleAttack = $doubleAttack;
        return $this;
    }

    public function isDoubleAttack(): bool
    {
        return $this->doubleAttack;
    }
}