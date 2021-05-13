<?php

declare(strict_types=1);

namespace Dundgren\Models\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the Dice class.
 */
class DiceTest extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateDiceClass()
    {
        $dice = new Dice(6);
        $this->assertInstanceOf("Dundgren\Models\Dice\Dice", $dice);
    }

    public function testRollDice()
    {
        $dice = new Dice(6);
        $res = $dice->rollDice();
        $this->assertIsInt($res);
        $this->assertTrue($res <= 6 && $res >= 1);
    }

    public function testGetLastRoll()
    {
        $dice = new Dice(6);
        $res = $dice->rollDice();
        $res2 = $dice->getLastRoll();
        $this->assertIsInt($res2);
        $this->assertEquals($res, $res2);
    }
}
