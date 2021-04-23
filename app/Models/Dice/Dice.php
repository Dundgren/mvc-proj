<?php

declare(strict_types=1);

namespace Dundgren\Models\Dice;

/**
 * Class Dice.
 */
class Dice
{
    private int $faces;
    protected ?int $roll = null;

    public function __construct($faces)
    {
        $this->faces = $faces;
    }

    public function rollDice(): int
    {
        $this->roll = rand(1, $this->faces);

        return $this->roll;
    }

    public function getLastRoll(): ?int
    {
        return $this->roll;
    }
}
