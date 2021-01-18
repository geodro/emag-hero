<?php

namespace App\Factories;

use App\Entities\Orderus;

class OrderusCreator implements CreatureCreator
{
    public static function new(): Orderus
    {
        $health = rand(60, 90);
        return new Orderus(
            initHealth: $health,
            health: $health,
            strength: rand(60, 90),
            defence: rand(40, 60),
            speed: rand(40, 60),
            luck: rand(25, 40)
        );
    }

    public static function hydrate(array $attrs): Orderus
    {
        return new Orderus(...$attrs);
    }
}