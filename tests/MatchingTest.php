use PHPUnit\Framework\TestCase;

class MatchingTest extends TestCase
{
    public function testMatchedPlayerRedirectsToCheckersPage()
    {
        // Set up the test environment
        $_SESSION = [
            'player' => [
                'id' => 1,
                'username' => 'player1'
            ]
        ];
        require_once('matching.php');

        // Assert that the player is redirected to the checkers page
        $this->assertStringContainsString('Location: checkers.php', xdebug_get_headers()[0]);
    }

    public function testNoMatchRedirectsToNoMatchPage()
    {
        // Set up the test environment
        $_SESSION = [
            'player' => [
                'id' => 1,
                'username' => 'player1'
            ]
        ];
        require_once('matching.php');

        // Assert that the player is redirected to the no match page
        $this->assertStringContainsString('Location: noMatch.php', xdebug_get_headers()[0]);
    }
}
