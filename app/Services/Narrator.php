<?php

namespace App\Services;

use App\Entities\Creature;
use App\Entities\Fight;

class Narrator
{
    public static function fight(Creature $attacker, Creature $defender, ?Fight $fight): string
    {
        if ($fight && $fight->getDamage() > 0) {
            return "{$attacker->getName()} {$fight->getAttack()} making {$fight->getDamage()} damage, {$defender->getName()} defends using {$fight->getDefence()}";
        } else {
            return "{$attacker->getName()} misses the strike";
        }
    }

    public static function creatureWin(Creature $creature): string
    {
        return "{$creature->getName()} is the winner. Game over.";
    }

    public static function draw(): string
    {
        return "The game is draw";
    }
}