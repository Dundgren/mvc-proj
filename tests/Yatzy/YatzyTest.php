<?php

declare(strict_types=1);

namespace Dundgren\Yatzy;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the Dice class.
 */
class YatzyTest extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateYatzyClass()
    {
        $yatzy = new Yatzy();
        $this->assertInstanceOf("Dundgren\Yatzy\Yatzy", $yatzy);
    }

    public function testPlayerRoll()
    {
        $_SESSION["rollCount"] = 2;
        $_SESSION["currentSumProtocol"] = 6;
        $_SESSION["playerSum"] = 63;
        $_POST["savedDice"] = [1];


        $yatzy = new Yatzy();
        $res = $yatzy->playerRoll();

        $this->assertEquals("Rolled", $res);
    }

    public function testResetGame()
    {
        $yatzy = new Yatzy();
        $res = $yatzy->resetGame();

        $this->assertEmpty($_SESSION["rollCount"]);
        $this->assertEmpty($_SESSION["playerSum"]);
        $this->assertEquals(1, $_SESSION["currentSumProtocol"]);
        $this->assertEquals("Go", $_SESSION["stopRoll"]);
        $this->assertEquals("Play Yatzy!!!!!!!!", $res);
    }
}
