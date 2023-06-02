<?php
require 'vendor/autoload.php';

use otp\php;

class phpTest extends PHPUnit\Framework\TestCase
{
    /**
     * @covers otp\otp
    */
    public function testHello()
    {
        $this->assertEquals(php::hello("cwenga"), "cwenga");
     
    }

}
