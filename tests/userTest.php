<?php
require 'vendor/autoload.php';

use otp\user;

    /**
     * @covers otp\user
    */

    class userTest extends PHPUnit\Framework\TestCase{

        public function testDivide()
        {
            $this->assertEquals(user::hello("cwenga"), "cwenga");
         
        }
    }
   

   
