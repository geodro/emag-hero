<?php

namespace App\Factories;

use App\Services\Game;
use Core\Session;

class GameFactory
{
    public static function new(): Game
    {
        return new Game(
            orderus: OrderusCreator::new(),
            beast: BeastCreator::new()
        );
    }

    public static function load(): ?Game
    {
        $game = Session::get('game');

        if (empty($game)) {
            return null;
        }

        return new Game(
            orderus: OrderusCreator::hydrate($game['orderus']),
            beast: BeastCreator::hydrate($game['beast']),
            fight: $game['fight'],
            fights: $game['fights'],
            finished: $game['finished']
        );
    }
}