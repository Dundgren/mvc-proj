<?php

declare(strict_types=1);

namespace Dundgren\Http\Controllers;

use Dundgren\Models\Game21\Game21;

/**
 * Controller for game 21
 */
class Game21Controller
{
    private function render($message)
    {
        return view("game21.index", [
            "header" => "Game 21",
            "message" => $message,
        ]);
    }

    public function reset()
    {
        $game = new Game21();
        $message = $game->resetGame();

        return $this->render($message);
    }

    public function clear()
    {
        $game = new Game21();
        $game->clearHistory();
        $message = $game->resetGame();

        return $this->render($message);
    }

    public function playerRoll()
    {
        $game = new Game21();
        $message = $game->playerRoll();

        return $this->render($message);
    }

    public function botRoll()
    {
        $game = new Game21();
        $message = $game->botRoll();

        return $this->render($message);
    }
}
