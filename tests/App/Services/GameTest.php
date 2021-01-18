<?php

namespace Tests\App\Services;

use App\Factories\GameFactory;
use App\Services\Game;
use Core\Session;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testSave(): void
    {
        Session::delete('game');

        GameFactory::new()->save();

        $this->assertIsArray(Session::get('game'));
    }

    public function testBattle(): void
    {
        $game = GameFactory::new();

        $this->assertEmpty($game->getFights());

        $this->assertInstanceOf(Game::class, $game->battle());

        $this->assertNotEmpty($game->getFights());
    }
}