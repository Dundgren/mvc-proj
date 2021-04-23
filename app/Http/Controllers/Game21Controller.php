<?php

declare(strict_types=1);

namespace Dundgren\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use Dundgren\Game21\Game21;

use function Mos\Functions\renderView;

/**
 * Controller for game 21
 */
class Game21Controller
{
    private function render($message): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $data = [
            "header" => "Game 21",
            "message" => $message,
        ];

        $body = renderView("layout/game21.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function reset(): ResponseInterface
    {
        $game = new Game21();
        $message = $game->resetGame();

        return $this->render($message);
    }

    public function clear(): ResponseInterface
    {
        $game = new Game21();
        $game->clearHistory();
        $message = $game->resetGame();

        return $this->render($message);
    }

    public function playerRoll(): ResponseInterface
    {
        $game = new Game21();
        $message = $game->playerRoll();

        return $this->render($message);
    }

    public function botRoll(): ResponseInterface
    {
        $game = new Game21();
        $message = $game->botRoll();

        return $this->render($message);
    }
}
