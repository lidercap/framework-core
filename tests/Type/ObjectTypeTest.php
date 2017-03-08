<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\ObjectType;
use Lidercap\Core\Type\StringType;

class ObjectTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new ObjectType);
    }

    public function testContructDefaultValue()
    {
        new ObjectType();
    }

    public function testContructNull()
    {
        new ObjectType(null);
    }

    public function testIsValid()
    {
        $object = new ObjectType(new \stdClass);
        $this->assertTrue($object->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Tipo de dado inválido
     * @expectedExceptionCode -1
     */
    public function testIsInvalid()
    {
        $string = new ObjectType(1);
    }

    /**
     * @return array
     */
    public function providerObjectsAndNamespaces()
    {
        return [
            ['Lidercap\Core\Type\StringType', 'Lidercap\Core\Type', 'StringType'],
            ['Lidercap\Core\Type\NumberType', 'Lidercap\Core\Type', 'NumberType'],
            ['Lidercap\Core\Type\CpfType', 'Lidercap\Core\Type', 'CpfType'],
        ];
    }

    /**
     * @dataProvider providerObjectsAndNamespaces
     *
     * @param string $objectPath
     * @param string $objectNamespace
     * @param string $objectName
     */
    public function testGetBasename($objectPath, $objectNamespace, $objectName)
    {
        $object = new ObjectType(new $objectPath());
        $this->assertEquals($objectName, $object->getBasename());
    }

    /**
     * @dataProvider providerObjectsAndNamespaces
     *
     * @param string $objectPath
     * @param string $objectNamespace
     * @param string $objectName
     */
    public function testGetnamespace($objectPath, $objectNamespace, $objectName)
    {
        $object = new ObjectType(new $objectPath());
        $this->assertEquals($objectNamespace, $object->getNamespace());
    }

    /**
     * @dataProvider providerObjectsAndNamespaces
     *
     * @param string $objectPath
     * @param string $objectNamespace
     * @param string $objectName
     */
    public function testGetPath($objectPath, $objectNamespace, $objectName)
    {
        $object = new ObjectType(new $objectPath());
        $this->assertEquals($objectPath, $object->getPath());
    }
}
