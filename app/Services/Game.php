<?php

namespace App\Services;

use App\Entities\Beast;
use App\Entities\Creature;
use App\Entities\Orderus;
use Core\Session;

class Game
{
    private Orderus $orderus;
    private Beast $beast;
    private int $fight;
    private array $fights = [];
    private bool $finished = false;

    public function __construct(Orderus $orderus, Beast $beast, int $fight = 0, array $fights = [], bool $finished = false)
    {
        $this->orderus = $orderus;
        $this->beast = $beast;
        $this->fight = $fight;
        $this->fights = $fights;
        $this->finished = $finished;
    }

    public function getOrderus(): Orderus
    {
        return $this->orderus;
    }

    public function getBeast(): Beast
    {
        return $this->beast;
    }

    public function getFight(): int
    {
        return $this->fight;
    }

    public function getFights(): array
    {
        return $this->fights;
    }

    public function finished(): bool
    {
        return $this->finished;
    }

    public function save(): Game
    {
        Session::put('game', [
            'fight' => $this->fight,
            'fights' => $this->fights,
            'finished' => $this->finished,
            'orderus' => $this->orderus->toArray(),
            'beast' => $this->beast->toArray()
        ]);

        return $this;
    }

    public function battle(int $fight = 0): Game
    {
        if (isset($this->fights[$fight])) {
            return $this;
        }

        $this->fight = $fight;
        $this->fights[$fight] = '';

        if ($this->orderus->getSpeed() > $this->beast->getSpeed()) {
            $this->fight($this->orderus, $this->beast);
        } else if ($this->orderus->getSpeed() < $this->beast->getSpeed()) {
            $this->fight($this->beast, $this->orderus);
        } else if ($this->getOrderus()->getLuck() >= $this->beast->getLuck()) {
            $this->fight($this->orderus, $this->beast);
        } else {
            $this->fight($this->beast, $this->orderus);
        }

        if (count($this->fights) == 20 && !$this->finished) {
            $this->finished = true;
            $this->narrate(Narrator::draw());
        }

        return $this->save();
    }

    protected function fight(Creature $attacker, Creature $defender, bool $strikeBack = false): void
    {
        $fight = $attacker->attack($defender);
        $this->narrate(Narrator::fight($attacker, $defender, $fight));

        if ($fight?->isDoubleAttack()) {
            $fight = $attacker->attack($defender);
            $this->narrate(Narrator::fight($attacker, $defender, $fight));
        }

        if (!$this->creatureIsDead($defender, $attacker) && !$strikeBack) {
            $this->fight($defender, $attacker, true);
        }
    }

    protected function creatureIsDead(Creature $creature, Creature $attacker): bool
    {
        $dead = $creature->getHealth() <= 0;

        if ($dead) {
            $this->narrate(Narrator::creatureWin($attacker));
            $this->finished = true;
        }

        return $dead;
    }

    protected function narrate(string $narration): string
    {
        if (!empty($this->fights[$this->fight])) {
            $this->fights[$this->fight] .= ";<br>";
        }

        return $this->fights[$this->fight] .= $narration;
    }
}