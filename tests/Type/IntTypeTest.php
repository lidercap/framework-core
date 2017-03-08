<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\Int;

class IntTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new Int);
    }

    /**
     * @return array
     */
    public function providerValidInts()
    {
        return [
            [1],
            [1000],
        ];
    }

    /**
     * @dataProvider providerValidInts
     *
     * @param int $value
     */
    public function testIsValid($value)
    {
        $int = new Int($value);
        $this->assertTrue($int->isValid($value));
    }

    /**
     * @return array
     */
    public function providerInvalidInts()
    {
        return [
            [1.0],
            [0.1],
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
     * @dataProvider providerInvalidInts
     *
     * @param mixed $value
     */
    public function testIsInvalid($value)
    {
        $int = new Int($value);
        $this->assertFalse($int->isValid($value));
    }
}
