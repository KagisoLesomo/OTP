<?php

use PHPUnit\Framework\TestCase;

require_once("functions.php");
require_once("login.php");

class LoginTest extends TestCase
{
    public function testSuccessfulLoginRedirectsToHomepage()
    {
        // Create a mock POST request with a valid username and password
        $_POST['username'] = 'valid_username';
        $_POST['password'] = 'valid_password';

        // Capture the output of the script using output buffering
        ob_start();
        include('login.php');
        $output = ob_get_clean();

        // Assert that the script redirects to homepage.php
        $this->assertStringContainsString('Location: homepage.php', $output);
    }

    public function testUnsuccessfulLoginRedirectsToLoginHtml()
    {
        // Create a mock POST request with an invalid username and password
        $_POST['username'] = 'invalid_username';
        $_POST['password'] = 'invalid_password';

        // Capture the output of the script using output buffering
        ob_start();
        include('login.php');
        $output = ob_get_clean();

        // Assert that the script redirects to login.html
        $this->assertStringContainsString('Location: login.html', $output);
    }
}
