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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Número inválido
     * @expectedExceptionCode -1
     */
    public function testIsInvalid()
    {
        new Number('string');
    }

    public function testLength()
    {
        $value  = rand(1, 100);
        $string = new Number($value);

        $this->assertEquals(strlen($value), $string->length());
    }
}
