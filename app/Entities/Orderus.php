<?php

namespace App\Entities;

use App\Skills\HasMagicShield;
use App\Skills\HasRapidStrike;

class Orderus extends Creature
{
    use HasRapidStrike, HasMagicShield;
}