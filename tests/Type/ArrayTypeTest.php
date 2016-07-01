<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\ArrayType;

class ArrayTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new ArrayType);
    }

    public function testIsValid()
    {
        $array = new ArrayType([]);
        $this->assertTrue($array->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Tipo de dado inválido
     * @expectedExceptionCode -1
     */
    public function testIsInvalid()
    {
        $array = new ArrayType('string');
    }

    public function testLength()
    {
        $value = [1, 2, 3];
        $array = new ArrayType($value);

        $this->assertEquals(count($value), $array->length());
    }
}
