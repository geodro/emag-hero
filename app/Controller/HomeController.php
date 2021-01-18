<?php

namespace App\Controller;

use App\Factories\GameFactory;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session;

class HomeController
{
    public function index(): Response
    {
        return Response::view('index');
    }

    public function start(): Response
    {
        Session::delete('game');

        return Response::view('start', [
            'game' => GameFactory::new()->save()
        ]);
    }

    public function battle(Request $request): Response
    {
        $fight = $request->get('fight', 1);

        $game = GameFactory::load();

        if (empty($game)) {
            return Response::redirect('/start');
        }

        if ($game->finished() && $fight > $game->getFight() + 1) {
            return Response::redirect('battle', [
                'fight' => $game->getFight() + 1
            ]);
        }

        if (!$game->finished() && $fight > count($game->getFights()) + 1) {
            return Response::redirect('battle', [
                'fight' => count($game->getFights()) ?: null
            ]);
        }

        $game->battle($fight - 1);

        return Response::view('battle', [
            'fight' => $fight,
            'game' => $game
        ]);
    }
}