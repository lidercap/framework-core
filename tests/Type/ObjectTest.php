<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\Object;
use Lidercap\Core\Type\String;

class ObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new Object);
    }

    public function testContructDefaultValue()
    {
        new Object();
    }

    public function testContructNull()
    {
        new Object(null);
    }

    public function testIsValid()
    {
        $object = new Object(new \stdClass);
        $this->assertTrue($object->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Tipo de dado inválido
     * @expectedExceptionCode -1
     */
    public function testIsInvalid()
    {
        $string = new Object(1);
    }

    /**
     * @return array
     */
    public function providerObjectsAndNamespaces()
    {
        return [
            ['Lidercap\Core\Type\String', 'Lidercap\Core\Type', 'String'],
            ['Lidercap\Core\Type\Number', 'Lidercap\Core\Type', 'Number'],
            ['Lidercap\Core\Type\Cpf', 'Lidercap\Core\Type', 'Cpf'],
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
        $object = new Object(new $objectPath());
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
        $object = new Object(new $objectPath());
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
        $object = new Object(new $objectPath());
        $this->assertEquals($objectPath, $object->getPath());
    }
}
