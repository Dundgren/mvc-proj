<?php

declare(strict_types=1);

namespace Dundgren\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use Dundgren\Yatzy\Yatzy;

use function Mos\Functions\renderView;

/**
 * Controller for game 21
 */
class YatzyController
{
    private function render($message): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $data = [
            "header" => "Yatzy",
            "message" => $message,
        ];

        $body = renderView("layout/yatzy.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function resetGame(): ResponseInterface
    {
        $game = new Yatzy();
        $message = $game->resetGame();

        return $this->render($message);
    }

    public function playerRoll(): ResponseInterface
    {
        $game = new Yatzy();
        $message = $game->playerRoll();

        return $this->render($message);
    }
}
