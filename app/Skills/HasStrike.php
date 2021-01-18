<?php

namespace App\Skills;

use App\Entities\Creature;
use App\Entities\Fight;

trait HasStrike
{
    public function attack(Creature $creature): ?Fight
    {
        return $creature->defend($this->strength)?->setAttack('strikes');
    }
}