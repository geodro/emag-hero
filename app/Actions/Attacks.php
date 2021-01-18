<?php

namespace App\Actions;

use App\Entities\Creature;
use App\Entities\Fight;

interface Attacks
{
    function attack(Creature $creature): ?Fight;
}