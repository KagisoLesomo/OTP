<?php

use otp\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testValidCredentials()
    {
        $database = new Database();
        $isValid = $database->isValidCredentials('admin', 'password');
        $this->assertTrue($isValid);
    }

    public function testInvalidCredentials()
    {
        $database = new Database();
        $isValid = $database->isValidCredentials('user', 'wrongpassword');
        $this->assertFalse($isValid);
    }
}
