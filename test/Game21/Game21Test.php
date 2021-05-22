<?php

declare(strict_types=1);

namespace Dundgren;

use Dundgren\Models\Game21\Game21;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Dice class.
 */
class Game21Test extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateGame21Class()
    {
        $game21 = new Game21();
        $this->assertInstanceOf("Dundgren\Models\Game21\Game21", $game21);
    }

    public function testResetGame()
    {
        $game21 = new Game21();
        $res = $game21->resetGame();

        $this->assertEmpty($_SESSION["botSum"]);
        $this->assertEmpty($_SESSION["playerSum"]);
        $this->assertEmpty($_SESSION["botResults"]);
        $this->assertEmpty($_SESSION["playerResults"]);
        $this->assertEquals("Play a game of 21!", $res);
    }

    public function testPlayerRollStart()
    {
        $_POST["dice"] = 2;
        $game21 = new Game21();
        $res = $game21->playerRoll();
        $this->assertEquals("Game started!", $res);
    }

    public function testPlayerRollLoss()
    {
        $_SESSION["isTest"] = true;
        $_POST["dice"] = 2;
        $_SESSION["playerSum"] = 22;
        $game21 = new Game21();
        $res = $game21->playerRoll();
        $this->assertEquals("House wins!", $res);
    }

    public function testPlayerRollWin()
    {
        $_SESSION["isTest"] = true;
        $_POST["dice"] = 0;
        $_SESSION["playerSum"] = 21;
        $game21 = new Game21();
        $res = $game21->playerRoll();
        $this->assertEquals("Player wins!", $res);
    }

    public function testBotRollLoss()
    {
        $_SESSION["isTest"] = true;
        $_POST["dice"] = 2;
        $_SESSION["botSum"] = 22;
        $game21 = new Game21();
        $res = $game21->botRoll();
        $this->assertEquals("Player wins!", $res);
    }

    public function testBotRollWin()
    {
        $_SESSION["isTest"] = true;
        $_POST["dice"] = 1;
        $_SESSION["playerSum"] = 7;
        $_SESSION["botSum"] = 0;
        $game21 = new Game21();
        $res = $game21->botRoll();
        $this->assertEquals("House wins!", $res);
    }

    public function testBotRollWin2()
    {
        $_SESSION["isTest"] = true;
        $_POST["dice"] = 0;
        $_SESSION["playerSum"] = 7;
        $_SESSION["botSum"] = 21;
        $game21 = new Game21();
        $res = $game21->botRoll();
        $this->assertEquals("House wins!", $res);
    }
}
