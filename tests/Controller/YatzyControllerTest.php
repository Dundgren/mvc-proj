<?php

declare(strict_types=1);

namespace Dundgren\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the Dice class.
 */
class YatzyControllerTest extends TestCase
{
    /**
     * Try to create the Dice class.
     */
    public function testCreateYatzyControllerClass()
    {
        $yatzyc = new YatzyController();
        $this->assertInstanceOf("Dundgren\Controller\YatzyController", $yatzyc);
    }

    public function testResetGame()
    {
        $yatzyc = new YatzyController();
        $res = $yatzyc->resetGame();
        $this->assertInstanceOf("Psr\Http\Message\ResponseInterface", $res);
    }
}
