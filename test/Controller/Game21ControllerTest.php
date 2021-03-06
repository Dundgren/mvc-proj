<?php

declare(strict_types=1);

namespace Dundgren\Http\Controllers;

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
        $this->assertInstanceOf("Dundgren\Http\Controllers\Game21Controller", $game21c);
    }
}
