<?php
require 'vendor/autoload.php';

use otp\otp;

class otpTest extends PHPUnit\Framework\TestCase
{
    /**
     * @covers otp\otp
    */
    public function testSubtract()
    {
        $this->assertEquals(otp::subtract(1, 2), -1.0);
        $this->assertEquals(otp::subtract(2, 1), 1.0);
        $this->assertEquals(otp::subtract(1.0, 2.0), -1.0);
        $this->assertEquals(otp::subtract(0, 2.0), -2.0);
        $this->assertEquals(otp::subtract(2.0, 0), 2.0);
        $this->assertEquals(otp::subtract(-4, 2.0), -6.0);
    }

    /**
     * @covers otp\otp
    */
    public function testMultiply()
    {
        $this->assertEquals(otp::multiply(1, 2), 2.0);
        $this->assertEquals(otp::multiply(1.0, 2.0), 2.0);
        $this->assertEquals(otp::multiply(0, 2.0), 0.0);
        $this->assertEquals(otp::multiply(2.0, 0), 0.0);
        $this->assertEquals(otp::multiply(-4, 2.0), -8.0);
    }

    /**
     * @covers otp\otp
    */
    public function testDivide()
    {
        $this->assertEquals(otp::divide(1, 2), 0.5);
        $this->assertEquals(otp::divide(1.0, 2.0), 0.5);
        $this->assertEquals(otp::divide(0, 2.0), 0.0);
        $this->assertEquals(otp::divide(-4, 2.0), -2.0);
        $this->assertEquals(otp::divide(2.0, 0), 'Cannot divide by 0');
    }

   
}
