<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\AbstractType;

class AbstractTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractType
     */
    protected $abstractType;

    public function setUp()
    {
        $this->abstractType = $this->getMockForAbstractClass(AbstractType::class);
    }

    public function testGetErrorMessage()
    {
        $this->assertEquals('Tipo de dado inválido', $this->abstractType->getErrorMessage());
    }

    public function testLength()
    {
        $this->assertEquals(0, $this->abstractType->length());
    }
}
