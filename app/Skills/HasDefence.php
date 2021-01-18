<?php

namespace App\Skills;

use App\Entities\Fight;

trait HasDefence
{
    public function defend(int $attackerStrength): ?Fight
    {
        if (rand(0, 100) <= $this->luck) {
            return null;
        }

        $damage = $attackerStrength - $this->defence;

        if ($damage > 0) {
            $health = $this->health - $damage;
            $this->health = ($health > 0) ? $health : 0;
        }

        return new Fight("shield", $damage);
    }
}