<?php

namespace Tests\App\Factories;

use App\Factories\BeastCreator;
use App\Factories\GameFactory;
use App\Factories\OrderusCreator;
use App\Services\Game;
use Core\Session;
use PHPUnit\Framework\TestCase;

class GameFactoryTest extends TestCase
{
    public function testNew(): void
    {
        $this->assertInstanceOf(Game::class, GameFactory::new());
    }

    public function testLoad(): void
    {
        Session::delete('game');

        $this->assertNull(GameFactory::load());

        Session::put('game', [
            'orderus' => OrderusCreator::new(),
            'beast' => BeastCreator::new(),
            'fight' => 0,
            'fights' => [],
            'finished' => false
        ]);

        $this->assertInstanceOf(Game::class, GameFactory::new());
    }
}