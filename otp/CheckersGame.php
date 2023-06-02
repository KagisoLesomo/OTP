<?php
namespace otp;

require 'vendor/autoload.php';

class CheckersGame {
    private $board;
    private $currentPlayer;
    
    public function __construct() {
        $this->board = array(
            array(' ', 'B', ' ', 'B', ' ', 'B', ' ', 'B'),
            array('B', ' ', 'B', ' ', 'B', ' ', 'B', ' '),
            array(' ', 'B', ' ', 'B', ' ', 'B', ' ', 'B'),
            array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
            array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
            array('R', ' ', 'R', ' ', 'R', ' ', 'R', ' '),
            array(' ', 'R', ' ', 'R', ' ', 'R', ' ', 'R'),
            array('R', ' ', 'R', ' ', 'R', ' ', 'R', ' ')
        );
        
        $this->currentPlayer = 'B';
    }
    
    public function playGame() {
        echo "Welcome to Checkers!\n";
        
        while (!$this->isGameOver()) {
            $this->printBoard();
            $this->makeMove();
            $this->switchPlayer();
        }
        
        $this->printBoard();
        echo "Game Over! Winner: " . $this->getWinner() . "\n";
    }
    
    private function printBoard() {
        echo "   0 1 2 3 4 5 6 7\n";
        
        for ($row = 0; $row < 8; $row++) {
            echo $row . " ";
            
            for ($col = 0; $col < 8; $col++) {
                echo $this->board[$row][$col] . " ";
            }
            
            echo "\n";
        }
    }
    
    private function makeMove() {
        $validMoves = $this->getValidMoves();
        
        echo "Player " . $this->currentPlayer . ", make your move.\n";
        echo "Enter the row and column of the piece you want to move: ";
        $fromRow = (int) readline();
        $fromCol = (int) readline();
        
        while (!$this->isValidPiece($fromRow, $fromCol) || !in_array([$fromRow, $fromCol], $validMoves)) {
            echo "Invalid move! Please enter the row and column of a valid piece: ";
            $fromRow = (int) readline();
            $fromCol = (int) readline();
        }
        
        echo "Enter the row and column where you want to move the piece: ";
        $toRow = (int) readline();
        $toCol = (int) readline();
        
        while (!in_array([$toRow, $toCol], $validMoves)) {
            echo "Invalid move! Please enter the row and column of a valid move: ";
            $toRow = (int) readline();
            $toCol = (int) readline();
        }
        
        $this->movePiece($fromRow, $fromCol, $toRow, $toCol);
    }
    
    private function isValidPiece($row, $col) {
        return ($row >= 0 && $row < 8 && $col >= 0 && $col < 8 && $this->board[$row][$col] === $this->currentPlayer);
    }
    
    private function movePiece($fromRow, $fromCol, $toRow, $toCol) {
        $this->board[$toRow][$toCol] = $this->board[$fromRow][$fromCol];
        $this->board[$fromRow][$fromCol] = ' ';
        
        if ($this->isCaptureMove($fromRow, $fromCol, $toRow, $toCol)) {
            $capturedRow = ($fromRow + $toRow) / 2;
            $capturedCol = ($fromCol + $toCol) / 2;
            $this->board[$capturedRow][$capturedCol] = ' ';
        }
    }
    
    private function isCaptureMove($fromRow, $fromCol, $toRow, $toCol) {
        return (abs($fromRow - $toRow) == 2 && abs($fromCol - $toCol) == 2);
    }
    
    private function getValidMoves() {
        $validMoves = [];
        
        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                if ($this->board[$row][$col] === $this->currentPlayer) {
                    if ($this->isValidMove($row, $col, $row + 1, $col + 1)) {
                        $validMoves[] = [$row + 1, $col + 1];
                    }
                    
                    if ($this->isValidMove($row, $col, $row + 1, $col - 1)) {
                        $validMoves[] = [$row + 1, $col - 1];
                    }
                    
                    if ($this->isValidMove($row, $col, $row - 1, $col + 1)) {
                        $validMoves[] = [$row - 1, $col + 1];
                    }
                    
                    if ($this->isValidMove($row, $col, $row - 1, $col - 1)) {
                        $validMoves[] = [$row - 1, $col - 1];
                    }
                }
            }
        }
        
        return $validMoves;
    }
    
    private function isValidMove($fromRow, $fromCol, $toRow, $toCol) {
        if ($toRow < 0 || $toRow >= 8 || $toCol < 0 || $toCol >= 8) {
            return false;
        }
        
        if ($this->board[$toRow][$toCol] !== ' ') {
            return false;
        }
        
        $rowDiff = $toRow - $fromRow;
        $colDiff = abs($toCol - $fromCol);
        
        if ($this->board[$fromRow][$fromCol] === 'B') {
            return ($rowDiff == 1 && $colDiff == 1);
        } else {
            return ($rowDiff == -1 && $colDiff == 1);
        }
    }
    
    private function switchPlayer() {
        $this->currentPlayer = ($this->currentPlayer === 'B') ? 'R' : 'B';
    }
    
    private function isGameOver() {
        $blackCount = 0;
        $redCount = 0;
        
        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                if ($this->board[$row][$col] === 'B') {
                    $blackCount++;
                } elseif ($this->board[$row][$col] === 'R') {
                    $redCount++;
                }
            }
        }
        
        return ($blackCount == 0 || $redCount == 0);
    }
    
    private function getWinner() {
        $blackCount = 0;
        $redCount = 0;
        
        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                if ($this->board[$row][$col] === 'B') {
                    $blackCount++;
                } elseif ($this->board[$row][$col] === 'R') {
                    $redCount++;
                }
            }
        }
        
        if ($blackCount > $redCount) {
            return 'Black';
        } elseif ($redCount > $blackCount) {
            return 'Red';
        } else {
            return 'Draw';
        }
    }
}

$game = new CheckersGame();
$game->playGame();
