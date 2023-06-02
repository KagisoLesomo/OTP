<?php

use PHPUnit\Framework\TestCase;

class CheckersGameTest extends TestCase
{
    public function testPlayGame()
    {
        // Mock readline function
        $inputValues = [0, 0, 1, 1, 2, 2, 3, 3]; // Sample input values
        $inputIndex = 0;

        readline = function () use (&$inputValues, &$inputIndex) {
            $input = $inputValues[$inputIndex];
            $inputIndex++;

            return $input;
        };

        $game = new CheckersGame();
        $game->playGame();

        $this->expectOutputString("Welcome to Checkers!\n   0 1 2 3 4 5 6 7\n0 B   B   B   B\n1   B   B   B  \n2 B   B   B   B\n3       \n4       \n5 R   R   R   R\n6   R   R   R  \n7 R   R   R   R\nPlayer B, make your move.\nEnter the row and column of the piece you want to move: Enter the row and column where you want to move the piece: Game Over! Winner: Draw\n");
    }

    public function testIsValidPiece()
    {
        $game = new CheckersGame();

        $this->assertTrue($game->isValidPiece(1, 0));
        $this->assertFalse($game->isValidPiece(3, 0));
        $this->assertFalse($game->isValidPiece(-1, 0));
        $this->assertFalse($game->isValidPiece(1, 2));
    }

    public function testMovePiece()
    {
        $game = new CheckersGame();
        $game->movePiece(5, 0, 4, 1);

        $this->assertEquals(' ', $game->getBoard()[5][0]);
        $this->assertEquals('R', $game->getBoard()[4][1]);
    }

    public function testIsCaptureMove()
    {
        $game = new CheckersGame();

        $this->assertTrue($game->isCaptureMove(5, 0, 3, 2));
        $this->assertFalse($game->isCaptureMove(5, 0, 4, 1));
    }

    public function testIsValidMove()
    {
        $game = new CheckersGame();

        $this->assertTrue($game->isValidMove(5, 0, 4, 1));
        $this->assertFalse($game->isValidMove(5, 0, 6, 1));
        $this->assertFalse($game->isValidMove(5, 0, 4, 3));
    }

    public function testSwitchPlayer()
    {
        $game = new CheckersGame();

        $game->switchPlayer();
        $this->assertEquals('R', $game->getCurrentPlayer());

        $game->switchPlayer();
        $this->assertEquals('B', $game->getCurrentPlayer());
    }

    public function testIsGameOver()
    {
        $game = new CheckersGame();

        $this->assertFalse($game->isGameOver());

        $game->movePiece(5, 0, 4, 1);
        $this->assertFalse($game->isGameOver());

        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                if ($game->getBoard()[$row][$col] === 'R') {
                    $game->movePiece($row, $col, 6, 1);
                }
            }
        }

        $this->assertTrue($game->isGameOver());
    }

    public function testGetWinner()
    {
        $game = new CheckersGame();

        $this->assertEquals('Draw', $game->getWinner());

        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                if ($game->getBoard()[$row][$col] === 'B') {
                    $game->movePiece($row, $col, 6, 1);
                }
            }
        }

        $this->assertEquals('Black', $game->getWinner());
    }
}