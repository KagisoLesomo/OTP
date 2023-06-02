<?php
require 'vendor/autoload.php';

use otp\otp;

class addTest extends PHPUnit\Framework\TestCase
{
    /**
     * @covers otp\otp
    */
    public function testAdd()
    {
        $this->assertEquals(otp::add(1, 2), 3.0);
        $this->assertEquals(otp::add(1.0, 2.0), 3.0);
        $this->assertEquals(otp::add(0, 2.0), 2.0);
        $this->assertEquals(otp::add(2.0, 0), 2.0);
        $this->assertEquals(otp::add(-4, 2.0), -2.0);
    }

}
