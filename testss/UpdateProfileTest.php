<?php

use PHPUnit\Framework\TestCase;

class UpdateProfileTest extends TestCase
{
    public function testProfileUpdate()
    {
        // Mock the $_SESSION variable
        $_SESSION['player']['id'] = 123;

        // Mock the database connection
        $conn = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Mock the mysqli_query function
        $conn->expects($this->once())
            ->method('query')
            ->with($this->equalTo("UPDATE `player` SET username = 'new_username', email = 'new_email' WHERE id = '123'"))
            ->willReturn(true);

        // Mock the mysqli_real_escape_string function
        $conn->expects($this->exactly(2))
            ->method('real_escape_string')
            ->willReturnCallback(function ($value) {
                return addslashes($value);
            });

        // Mock the mysqli_fetch_assoc function
        $conn->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn(['username' => 'new_username', 'email' => 'new_email']);

        // Set the mock connection
        $GLOBALS['conn'] = $conn;

        // Include the script to test
        include 'update-profile.php';

        // Perform assertions
        $this->assertEquals('new_username', $user['username']);
        $this->assertEquals('new_email', $user['email']);
    }
}
