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
        // Replace this with your actual database update logic
        // Simulate a successful password update if the username is 'admin'
        if ($username === 'admin') {
            return true;
        }

        return false;
    }
}


