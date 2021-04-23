<?php

declare(strict_types=1);

namespace Dundgren\Models\Dice;

/**
 * Class Dice.
 */
class GraphicalDice extends Dice
{
    private const FACES = 6;
    private const DICEICONS = [
        "&#x2680",
        "&#x2681",
        "&#x2682",
        "&#x2683",
        "&#x2684",
        "&#x2685",
    ];

    public function __construct()
    {
        parent::__construct(self::FACES);
    }

    public function getLastRollGraph(): string
    {
        return self::DICEICONS[$this->roll - 1];
    }

    public function getIcon($num)
    {
        return self::DICEICONS[$num - 1];
    }
}
