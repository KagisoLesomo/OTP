<?php

use PHPUnit\Framework\TestCase;

class EnterGameTest extends TestCase
{
    public function testEnterGamePage()
    {
        ob_start();
        include '../enterGame.php';
        $output = ob_get_clean();

        // Perform assertions to verify the HTML structure
        $this->assertStringContainsString('<title>insert cool group name - login </title>', $output);
        $this->assertStringContainsString('<h1 class="join-text">', $output);
        $this->assertStringContainsString('<img src="multiplayer-sign.png" alt="Waiting for player">', $output);
        // Add more assertions as needed

        // Test the redirect header
        $headers = xdebug_get_headers();
        $this->assertContains('Location: http://10.100.15.216/loading.php', $headers);
    }
}
