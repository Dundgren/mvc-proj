<?php

declare(strict_types=1);

namespace Dundgren\Models\Game21;

use Dundgren\Models\Dice\DiceHand;

class Game21
{
    public function playerRoll(): string
    {

        if ($_POST["dice"] > 0) {
            $player = new DiceHand($_POST["dice"]);

            $player->rollDices();

            $_SESSION["playerSum"] += $player->getSum();
            array_push($_SESSION["playerResults"], $player->getResults()[0]);

            if ($_POST["dice"] == 2) {
                array_push($_SESSION["playerResults"], $player->getResults()[1]);
            }
        }

        $result = $this->checkPlayerResult($_SESSION["playerSum"]);

        $message = $this->displayResult($result);

        return $message;
    }

    public function botRoll(): string
    {
        $bot = new DiceHand($_POST["dice"]);

        do {
            if ($_POST["dice"] > 0) {
                $bot->rollDices();
                $_SESSION["botSum"] += $bot->getSum();
            }

            $result = $this->checkBotResult($_SESSION["botSum"]);
        } while ($result == "continue");

        $_SESSION["botResults"] = $bot->getResults();

        $message = $this->displayResult($result);

        return $message;
    }

    public function resetGame(): string
    {
        $_SESSION["playerResults"] = [];
        $_SESSION["botResults"] = [];
        $_SESSION["playerSum"] = 0;
        $_SESSION["botSum"] = 0;
        $_SESSION["history"] = $_SESSION["history"] ?? [
            "roundCount" => 0,
            "winners" => []
        ];

        return "Play a game of 21!";
    }

    public function clearHistory(): void
    {
        $_SESSION["history"] = null;
    }

    private function checkPlayerResult($playerSum): string
    {
        $result = "continue";

        if ($playerSum == 21) {
            $result = "win";
        } elseif ($playerSum > 21) {
            $result = "loss";
        }

        $this->handleResult($result);

        return $result;
    }

    private function checkBotResult($botSum): string
    {
        $result = "continue";

        if ($botSum == 21) {
            $result = "loss";
        } elseif ($botSum > 21) {
            $result = "win";
        } elseif ($botSum >= $_SESSION["playerSum"]) {
            $result = "loss";
        }

        $this->handleResult($result);

        return $result;
    }

    private function handleResult($result)
    {
        $_SESSION["result"] = $result;

        if ($result == "loss") {
            array_push($_SESSION["history"]["winners"], "bot");
            $_SESSION["history"]["roundCount"] += 1;
        } elseif ($result == "win") {
            array_push($_SESSION["history"]["winners"], "player");
            $_SESSION["history"]["roundCount"] += 1;
        }
    }

    private function displayResult($result): string
    {
        $message = "";

        if ($result == "win") {
            $message = ("Player wins!");
        } elseif ($result == "loss") {
            $message = ("Bot wins!");
        } elseif ($result == "continue") {
            $message = ("Game started!");
        }

        return $message;
    }
}
