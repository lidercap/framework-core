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

    public function testIsInvalid()
    {
        $array = new ArrayType('string');
        $this->assertFalse($array->isValid());
    }

    public function testLength()
    {
        $value = [1, 2, 3];
        $array = new ArrayType($value);

        $this->assertEquals(count($value), $array->length());
    }
}
