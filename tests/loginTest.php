<?php

namespace OTP;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testUsernameTrim()
    {
       $this->assertTrue( $this->trimUsernameTrim('Cwenga    ')=== 'Cwenga');

    }

    public function testEmailTrim()
    {
       $this->assertTrue( $this->trimUsernameTrim('   gcolotelacwenga@gmail.com    ')=== 'Cwenga');

    }

    

}



?>