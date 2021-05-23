<?php

declare(strict_types=1);

namespace Dundgren\Models\Dice;

/**
 * Class Dice.
 */
class DiceHand
{
    private $dices;
    private $results = [];
    private $sum = 0;

    public function __construct($numDice)
    {
        for ($i = 0; $i < $numDice; $i++) {
            $this->dices[$i] = new GraphicalDice();
        }
    }

    public function rollDices(): void
    {
        $len = count($this->dices);
        $this->sum = 0;

        for ($i = 0; $i < $len; $i++) {
            $this->sum += $this->dices[$i]->rollDice();
            array_push($this->results, $this->dices[$i]->getLastRollGraph());
        }
    }

    public function getSum(): int
    {
        return $this->sum;
    }

    public function setSum($newSum)
    {
        $this->sum = $newSum;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function convertToGraph($num)
    {
        return $this->dices[0]->getIcon($num);
    }
}
