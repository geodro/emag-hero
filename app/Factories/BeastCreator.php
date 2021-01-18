<?php

namespace App\Factories;

use App\Entities\Beast;

class BeastCreator implements CreatureCreator
{
    public static function new(): Beast
    {
        $health = rand(60, 90);
        return new Beast(
            initHealth: $health,
            health: $health,
            strength: rand(60, 90),
            defence: rand(40, 60),
            speed: rand(40, 60),
            luck: rand(25, 40)
        );
    }

    public static function hydrate(array $attrs): Beast
    {
        return new Beast(...$attrs);
    }
}