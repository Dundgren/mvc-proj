<?php

declare(strict_types=1);

namespace Dundgren\Yatzy;

use Dundgren\Dice\DiceHand;

class Yatzy
{
    public function playerRoll()
    {

        $player = new DiceHand(5);

        $_SESSION["stopRoll"] = $_POST["stopRoll"] ?? "Go";

        if ($_SESSION["stopRoll"] == "Go") {
            $player->rollDices();
        }

        $_SESSION["rollCount"] += 1;
        $_SESSION["playerResults"] = $player->getResults();

        $this->saveDice($player);

        if ($_SESSION["rollCount"] == 3 || $_SESSION["stopRoll"] == "Stop") {
            $this->sumDice();
        }

        $message = "Rolled";

        return $message;
    }

    public function resetGame(): string
    {
        $_SESSION["rollCount"] = 0;
        $_SESSION["playerSum"] = 0;
        $_SESSION["currentSumProtocol"] = 1;
        $_SESSION["SumProtocolSum"] = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
        ];
        $_SESSION["stopRoll"] = "Go";

        return "Play Yatzy!!!!!!!!";
    }

    private function saveDice($player): void
    {
        $_SESSION["savedDice"] = $_POST["savedDice"] ?? [];
        $numSavedDice = count($_SESSION["savedDice"]);

        for ($i = 0; $i < $numSavedDice; $i++) {
            $convertedDice = $player->convertToGraph($_SESSION["savedDice"][$i]);
            $_SESSION["playerResults"][$i] = $convertedDice;
        }
    }

    private function sumDice(): void
    {
        $dice = $_SESSION["playerResults"];
        $sum = 0;
        $valuesToAdd = $_SESSION["currentSumProtocol"];

        foreach ($dice as $d) {
            $diceValue = intval(substr($d, -1)) + 1;

            if ($diceValue == $valuesToAdd) {
                $sum += $diceValue;
            }
        }

        $_SESSION["playerSum"] += $sum;

        if ($valuesToAdd == 6 && $_SESSION["playerSum"] >= 63) {
            $_SESSION["playerSum"] += 50;
        }

        $_SESSION["SumProtocolSum"][$valuesToAdd] = $sum;
        $_SESSION["rollCount"] = 0;
        $_SESSION["currentSumProtocol"] += 1;
        $_SESSION["stopRoll"] = "Go";
    }
}
