<?php
require '.vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        // Mock the $_POST variables
        $_POST['username'] = 'testuser';
        $_POST['password'] = 'testpassword';

        // Mock the login_user function
        $this->mockFunction('login_user', true);

        // Include the script to test
        include '../login.php';

        // Perform assertions
        $this->assertEquals('homepage.php', $this->getResponseHeader('Location'));
    }

    public function testFailedLogin()
    {
        // Mock the $_POST variables
        $_POST['username'] = 'testuser';
        $_POST['password'] = 'invalidpassword';

        // Mock the login_user function
        $this->mockFunction('login_user', false);

        // Include the script to test
        include 'login.php';

        // Perform assertions
        $this->assertEquals('login.html', $this->getResponseHeader('Location'));
    }

    protected function mockFunction($functionName, $returnValue)
    {
        $mock = $this->getMockBuilder('stdClass')
            ->setMethods([$functionName])
            ->getMock();

        $mock->expects($this->once())
            ->method($functionName)
            ->willReturn($returnValue);

        $GLOBALS[$functionName] = [$mock, $functionName];
    }

    protected function getResponseHeader($headerName)
    {
        $headers = xdebug_get_headers();
        foreach ($headers as $header) {
            $headerParts = explode(':', $header, 2);
            if (count($headerParts) === 2 && strtolower(trim($headerParts[0])) === strtolower($headerName)) {
                return trim($headerParts[1]);
            }
        }
        return null;
    }
}
