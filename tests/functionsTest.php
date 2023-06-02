<?php

use PHPUnit\Framework\TestCase;

use otp\FunctionDatabase;
class FunctionDatabaseTest extends TestCase
{
    protected static $database;

    public static function setUpBeforeClass(): void
    {
        // Establish a database connection before running the tests
        self::$database = new FunctionDatabase("localhost", "root", "", "otp");
    }

    public function testConnectToDatabase()
    {
        // Ensure that the database connection is successful
        $this->assertTrue(self::$database->isConnected());
    }

    public function testWritePlayerData()
    {
        $playerData = [
            'name' => 'Player1',
            'at_home' => true,
            'password' => null
        ];

        // Write player data to the database
        $result = self::$database->writePlayerData($playerData);

        // Assert that the write operation was successful
        $this->assertTrue($result);

        // Verify that the player data is stored correctly in the database
        $storedPlayerData = self::$database->getPlayerData('Player1');

        // Assert that the retrieved player data matches the original data
        $this->assertEquals($playerData, $storedPlayerData);
    }
}
