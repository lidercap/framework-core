<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\FloatType;

class FloatTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new FloatType);
    }

    /**
     * @return array
     */
    public function providerValidFloats()
    {
        return [
            [1.0],
            [1.1],
            [0.1],
            [0.0],
        ];
    }

    /**
     * @dataProvider providerValidFloats
     *
     * @param float $value
     */
    public function testIsValid($value)
    {
        $float = new FloatType($value);
        $this->assertTrue($float->isValid($value));
    }

    /**
     * @return array
     */
    public function providerInvalidFloats()
    {
        return [
            [1],
            ['1'],
            [[]],
            [new \stdClass],
            ['my string'],
            [true],
            [false],
            [''],
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Número inválido
     * @expectedExceptionCode -1
     *
     * @dataProvider providerInvalidFloats
     *
     * @param mixed $value
     */
    public function testIsInvalid($value)
    {
        new FloatType($value);
    }
}
