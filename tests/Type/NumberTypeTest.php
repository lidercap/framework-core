<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\NumberType;

class NumberTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new NumberType);
    }

    public function testIsValid()
    {
        $string = new NumberType(1);
        $this->assertTrue($string->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Número inválido
     * @expectedExceptionCode -1
     */
    public function testIsInvalid()
    {
        new NumberType('string');
    }

    public function testLength()
    {
        $value  = rand(1, 100);
        $string = new NumberType($value);

        $this->assertEquals(strlen($value), $string->length());
    }
}
