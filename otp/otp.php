<?php
namespace otp;

// signup mock testing 

class Signup
{
    public function register($name, $email, $password, $confirmPassword)
    {
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if ($password !== $confirmPassword) {
            return false;
        }
        // if not false then we have successful registration
        return true;
    }

  
}

class Login
{
    private $username;
    private $password;
    private $database;

    public function __construct($username, $password, Database $database)
    {
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function authenticate()
    {
        // Use the database object to authenticate the user
        return $this->database->isValidCredentials($this->username, $this->password);
    }
}

class Database
{
    public function isValidCredentials($username, $password)
    {
        // Replace this with your actual database logic
        if ($username === 'admin' && $password === 'password') {
            return true;
        }

        return false;
    }
}

class UpdatePassword
{
    private $updateDatabase;

    public function __construct(UpdateDatabase $updateDatabase)
    {
        $this->updateDatabase = $updateDatabase;
    }

    public function changePassword($username, $newPassword)
    {
        // Call the updatePassword method of the updateDatabase object
        return $this->updateDatabase->updatePassword($username, $newPassword);
    }
}

class UpdateDatabase
{
    public function updatePassword($username, $newPassword)
    {
        // Simulate a successful password update if the username is 'admin'
        if ($username === 'admin') {
            return true;
        }

        return false;
    }
}



// game history function 

// retrieves necessary game information from mock database for tests

class GameHistory
{
    private $gameDatabase;


    // database constructor
    public function __construct(GameDatabase $gameDatabase)
    {
        $this->gameDatabase = $gameDatabase;
    }

    public function retrieveGameHistory()
    {
        // Call the getGameHistory method of the game database object
        return $this->gameDatabase->getGameHistory();
    }
}


// Game Database 
class GameDatabase
{
    public function getGameHistory()
    {
    
        // Simulate retrieving game history data from the database
        return [
            [
                'id' => 1,
                'player_id' => 1,
                'opponent_id' => 2,
                'result' => 'win',
                'played_at' => '2023-06-01 19:30:00'
            ],
            [
                'id' => 2,
                'player_id' => 1,
                'opponent_id' => 3,
                'result' => 'loss',
                'played_at' => '2023-06-02 14:45:00'
            ],
            [
                'id' => 3,
                'player_id' => 2,
                'opponent_id' => 3,
                'result' => 'win',
                'played_at' => '2023-06-02 16:15:00'
            ],
        ];
    }
}

class Checker {
    private $element;
    private $position;
    private $king;
    private $player;
    private $board;

    public function __construct($element, $position, $board) {
        $this->element = $element;
        $this->position = $position;
        $this->king = false;
        $this->player = null;
        $this->board = $board;

        if ($this->element->getAttribute('id') < 20) {
            $this->player = 1;
        } else {
            $this->player = 2;
        }
    }

    public function makeKing() {
        $kingStyle = document.createElement('i');
        $kingStyle->classList->add('em', 'em-crown');

        $this->element->appendChild($kingStyle);
        $this->king = true;
    }

    public function move($tile) {
        function getChecker() {
            $xhr = new XMLHttpRequest();
            $xhr->open('GET', 'processSome.php?start=' . 0, true);
            $xhr->send();
        }

        getChecker();

        if (!$this->board->isValidPlaceToMove($tile->position[0], $tile->position[1])) {
            return false;
        }

        $this->element->classList->remove('selected');

        if ($this->player === 1 && !$this->king) {
            if ($tile->position[0] < $this->position[0]) {
                return false;
            }
        } elseif ($this->player === 2 && !$this->king) {
            if ($tile->position[0] > $this->position[0]) {
                return false;
            }
        }

        $this->board->board[$this->position[0]][$this->position[1]] = 0;
        $this->board->board[$tile->position[0]][$tile->position[1]] = $this->player;

        gameManager->drawManager->moveChecker($this, $tile);
        gameManager->changePlayerTurn();

        $this->position = [$tile->position[0], $tile->position[1]];

        if (!$this->king && ($this->position[0] === 0 || $this->position[0] === $this->board->boardSize - 1)) {
            $this->makeKing();

            Logger::log('Player ' . ($this->player === 1 ? '1' : '2') . ': ' . DrawManger::getTileName($this->position[0], $this->position[1]) . ' became king');
        }

        return true;
    }

    public function canMove() {
        if (count($this->position) === 0) {
            return false;
        }

        if ($this->canAttack([$this->position[0] + 2, $this->position[1] + 2]) ||
            $this->canAttack([$this->position[0] + 2, $this->position[1] - 2]) ||
            $this->canAttack([$this->position[0] - 2, $this->position[1] + 2]) ||
            $this->canAttack([$this->position[0] - 2, $this->position[1] - 2])) {
            return true;
        } else {
            return false;
        }
    }

    public function canAttack($newPosition) {
        if ($newPosition === null) {
            return false;
        }

        if (!is_numeric($newPosition[0]) || !is_numeric($newPosition[1])) {
            return false;
        }

        if ($newPosition[0] > $this->board->boardSize || $newPosition[1] > $this->board->boardSize || $newPosition[0] < 0 || $newPosition[1] < 0) {
            return false;
        }

        $dx = $newPosition[1] - $this->position[1];
        $dy = $newPosition[0] - $this->position[0];

        if ($this->player === 1 && !$this->king) {
            if ($newPosition[0] < $this->position[0]) {
                return false;
            }
        } elseif ($this->player === 2 && !$this->king) {
            if ($newPosition[0] > $this->position[0]) {
                return false;
            }
        }

        $checkTileX = floor($this->position[1] + $dx / 2);
        $checkTileY = floor($this->position[0] + $dy / 2);

        if (!$this->board->isValidPlaceToMove($checkTileY, $checkTileX) && $this->board->isValidPlaceToMove($newPosition[0], $newPosition[1])) {
            foreach ($this->board->checkers as $checkerIndex => $checker) {
                if ($checker->position[0] === $checkTileY && $checker->position[1] === $checkTileX) {
                    if ($this->player !== $checker->player) {
                        return $checker;
                    }
                }
            }
        }

        return false;
    }

    public function attack($tile) {
        $checkerToRemove = $this->canAttack($tile->position);

        if ($checkerToRemove) {
            $this->remove($this->board->checkers[$checkerToRemove->element->getAttribute('id')]);
            function getChecker() {
                $xhr = new XMLHttpRequest();
                $xhr->open('GET', 'processSome.php?attack=' . 1, true);
                $xhr->send();
            }
            getChecker();
            return true;
        }

        return false;
    }

    public function remove($checker) {
        $checker->element->parentElement->removeChild($checker->element->parentElement->childNodes->item(1));
        $this->board->board[$checker->position[0]][$checker->position[1]] = 0;

        Logger::log('Player ' . ($this->player === 1 ? '1' : '2') . ': ' . DrawManger::getTileName($this->position[0], $this->position[1]) . ' attacked ' .
            DrawManger::getTileName($checker->position[0], $checker->position[1]));

        $checker->position = [];
    }
}
