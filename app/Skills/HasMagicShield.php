<?php

namespace App\Skills;

use App\Entities\Fight;

trait HasMagicShield
{
    use HasDefence {
        defend as basicDefend;
    }

    public function defend(int $attackerStrength): ?Fight
    {
        $magicShield = rand(0, 100) >= 90;

        if ($magicShield) {
            $damage = $attackerStrength - $this->defence;
            $fight = $this->basicDefend($attackerStrength - $damage / 2)
                ?->setDefence('magic shield');
        } else {
            $fight = $this->basicDefend($attackerStrength);
        }

        return $fight;
    }
}