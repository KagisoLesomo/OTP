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

        // Perform any other validation or business logic here

        // Simulate successful registration
        return true;
    }
}



