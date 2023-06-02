<?php

require 'vendor/autoload.php';

use otp\Signup;

class SignupTest extends \PHPUnit\Framework\TestCase
{
    public function testRegisterWithValidData()
    {
        $signup = new Signup();

        $name = "John Doe";
        $email = "john@example.com";
        $password = "password123";
        $confirmPassword = "password123";

        $result = $signup->register($name, $email, $password, $confirmPassword);

        $this->assertTrue($result);
    }

    public function testRegisterWithInvalidData()
    {
        $signup = new Signup();

        $name = "";
        $email = "invalidemail";
        $password = "password123";
        $confirmPassword = "password456";

        $result = $signup->register($name, $email, $password, $confirmPassword);

        $this->assertFalse($result);
    }
}