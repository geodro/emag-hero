<?php

namespace App\Skills;

use App\Entities\Creature;
use App\Entities\Fight;

trait HasRapidStrike
{
    use HasStrike {
        attack as basicAttack;
    }

    public function attack(Creature $creature): ?Fight
    {
        $doubleStrike = rand(0, 100) >= 90;

        $skill = $this->basicAttack($creature);

        if ($doubleStrike) {
            $skill?->setAttack('rapid strike')
                ->setDoubleAttack(true);
        }

        return $skill;
    }
}