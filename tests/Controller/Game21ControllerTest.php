<?php

declare(strict_types=1);

namespace Dundgren\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the Dice class.
 */
class Game21ControllerTest extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateGame21ControllerClass()
    {
        $game21c = new Game21Controller();
        $this->assertInstanceOf("Dundgren\Controller\Game21Controller", $game21c);
    }

    public function testReset()
    {
        $game21c = new Game21Controller();
        $res = $game21c->reset();
        $this->assertInstanceOf("Psr\Http\Message\ResponseInterface", $res);
    }

    public function testClear()
    {
        $game21c = new Game21Controller();
        $res = $game21c->clear();
        $this->assertInstanceOf("Psr\Http\Message\ResponseInterface", $res);
    }
}
