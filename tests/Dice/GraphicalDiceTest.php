<?php

declare(strict_types=1);

namespace Dundgren\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the Dice class.
 */
class GraphicalDiceTest extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateGraphicalDiceClass()
    {
        $graphDice = new GraphicalDice();
        $this->assertInstanceOf("Dundgren\Dice\Dice", $graphDice);
        $this->assertInstanceOf("Dundgren\Dice\GraphicalDice", $graphDice);
    }

    public function testGetIcon()
    {
        $graphDice = new GraphicalDice();
        $res = $graphDice->getIcon(1);
        $this->assertEquals("&#x2680", $res);
    }

    public function testGetLastRollGraph()
    {
        $graphDice = new GraphicalDice();
        $intRes = $graphDice->rollDice();
        $expectedGraphRes = $graphDice->getIcon($intRes);
        $graphRes = $graphDice->getLastRollGraph();
        $this->assertEquals($expectedGraphRes, $graphRes);
    }
}
