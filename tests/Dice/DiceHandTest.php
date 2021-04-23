<?php

declare(strict_types=1);

namespace Dundgren\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the Dice class.
 */
class DiceHandTest extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateDiceHandClass()
    {
        $diceHand = new DiceHand(3);
        $this->assertInstanceOf("Dundgren\Dice\Dicehand", $diceHand);
    }

    public function testGetResults()
    {
        $diceHand = new DiceHand(3);
        $diceHand->rollDices();
        $res = $diceHand->getResults();
        $this->assertTrue(count($res) == 3);

        foreach ($res as $r) {
            $this->assertIsString($r);
        }
    }

    public function testGetSum()
    {
        $diceHand = new DiceHand(3);
        $diceHand->rollDices();
        $res = $diceHand->getSum();
        $this->assertIsInt($res);
        $this->assertTrue($res <= 18);
    }

    public function testSetSum()
    {
        $diceHand = new DiceHand(3);
        $diceHand->setSum(18);
        $res = $diceHand->getSum();
        $this->assertEquals(18, $res);
    }

    public function testConvertToGraph()
    {
        $diceHand = new DiceHand(3);
        $res = $diceHand->convertToGraph(1);
        $this->assertEquals("&#x2680", $res);
    }
}
