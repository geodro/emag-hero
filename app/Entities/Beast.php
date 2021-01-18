<?php

namespace App\Entities;

use App\Skills\HasDefence;
use App\Skills\HasStrike;

class Beast extends Creature
{
    use HasStrike, HasDefence;
}