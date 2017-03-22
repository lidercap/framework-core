<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Util\CepUtil;

class CepUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testMask()
    {
        $masked = CepUtil::mask(12345678);
        $this->assertEquals('12345-678', $masked);
    }

    public function testIsMasked()
    {
        $this->assertTrue(CepUtil::isMasked('12345-678'));
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Method Lidercap\Core\Type\CepType::Invalid() does not exist
     * @expectedExceptionCode -1
     */
    public function testException()
    {
        CepUtil::Invalid();
    }
}
