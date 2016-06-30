<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new String);
    }

    public function testIsValid()
    {
        $string = new String('my string');
        $this->assertTrue($string->isValid());
    }

    public function testIsInvalid()
    {
        $string = new String(1);
        $this->assertFalse($string->isValid());
    }

    public function testLength()
    {
        $value  = 'this is my random string ' . rand(1, 100);
        $string = new String($value);

        $this->assertEquals(strlen($value), $string->length());
    }

    public function testTrim()
    {
        $value  = 'string';
        $string = new String(str_repeat(' ', rand(1, 100)) . $value . str_repeat(' ', rand(1, 100)));
        $this->assertEquals($value, $string->trim());
    }
}
