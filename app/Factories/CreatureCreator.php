<?php

namespace App\Factories;

use App\Entities\Creature;

interface CreatureCreator
{
    public static function new(): Creature;

    public static function hydrate(array $attrs): Creature;
}