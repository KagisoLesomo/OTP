
<?php

use otp\CheckersGame;
use PHPUnit\Framework\TestCase;

class CheckersGameTest extends TestCase
{


    /**
     * @covers otp\CheckersGame
     */
    public function testMakeMove_ValidMove_ReturnsTrue()
    {
        $game = new CheckersGame();
        $startPos = [2, 3];
        $endPos = [3, 4];

        $result = $game->makeMove($startPos, $endPos);

        $this->assertFalse($result);
    }

     /**
     * @covers otp\CheckersGame
     */
    public function testMakeMove_InvalidMove_ReturnsFalse()
    {
        $game = new CheckersGame();
        $startPos = [2, 3];
        $endPos = [4, 4]; // Invalid move, skipping a position

        $result = $game->makeMove($startPos, $endPos);

        $this->assertFalse($result);
    }
     /**
     * @covers otp\CheckersGame
     */

    public function testMakeMove_MoveToOccupiedPosition_ReturnsFalse()
    {
        $game = new CheckersGame();
        $startPos = [2, 3];
        $endPos = [3, 4];

        // Set the end position to be occupied
        $game->makeMove($startPos, $endPos);

        // Try making a move to the same end position again
        $result = $game->makeMove($endPos, $endPos);

        $this->assertFalse($result);
    }

     /**
     * @covers otp\CheckersGame
     */
    public function testMakeMove_MoveBackwards_ReturnsFalse()
    {
        $game = new CheckersGame();
        $startPos = [3, 4];
        $endPos = [2, 3];

        $result = $game->makeMove($startPos, $endPos);

        $this->assertFalse($result);
    }
   /**
     * @covers otp\CheckersGame
     */
    public function testMakeMove_OutsideBoard_ReturnsFalse()
    {
        $game = new CheckersGame();
        $startPos = [2, 3];
        $endPos = [8, 4]; // Outside board

        $result = $game->makeMove($startPos, $endPos);

        $this->assertFalse($result);
    }
}