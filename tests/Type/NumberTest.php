<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new Number);
    }

    public function testIsValid()
    {
        $string = new Number(1);
        $this->assertTrue($string->isValid());
    }

    public function testIsInvalid()
    {
        $string = new Number('string');
        $this->assertFalse($string->isValid());
    }

    public function testLength()
    {
        $value  = 'this is my random string ' . rand(1, 100);
        $string = new Number($value);

        $this->assertEquals(strlen($value), $string->length());
    }
}
