<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CepType;
use Lidercap\Core\Type\Maskable;

class CepTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(Maskable::class, new CepType);
    }

    /**
     * @return array
     */
    public function providerValidCeps()
    {
        return [
            ['00000-000'],
            ['00000000'],

            ['11111-111'],
            ['11111111'],

            ['01315-010'],
            ['01315010'],

            ['01232-001'],
            ['01232001'],

            ['05344-030'],
            ['05344030'],
        ];
    }

    /**
     * @dataProvider providerValidCeps
     *
     * @param string $value
     */
    public function testIsValid($value)
    {
        $cep = new CepType($value);
        $this->assertTrue($cep->isValid());
    }

    /**
     * @return array
     */
    public function providerInValidCeps()
    {
        return [
            ['000000-00'],
            ['0000000'],

            ['1111-1111'],
            ['111111111'],

            ['01315-a10'],
            ['01315a10'],

            ['01232-0a1'],
            ['012320a1'],

            ['05344-03a'],
            ['0534403a'],
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CEP inválido
     * @expectedExceptionCode -1
     *
     * @dataProvider providerInValidCeps
     *
     * @param string $value
     */
    public function testIsInValid($value)
    {
        new CepType($value);
    }

    /**
     * @return array
     */
    public function providerMaskedAndUnMasked()
    {
        return [
            ['12345678', '12345-678'],
            ['00000000', '00000-000'],
            ['01315010', '01315-010'],
        ];
    }

    /**
     * @dataProvider providerMaskedAndUnMasked
     *
     * @param string $unMasked
     * @param string $masked
     */
    public function testIsMasked($unMasked, $masked)
    {
        $cep = new CepType($masked);
        $this->assertTrue($cep->isMasked());

        $cep = new CepType($unMasked);
        $this->assertFalse($cep->isMasked());
    }

    /**
     * @dataProvider providerMaskedAndUnMasked
     *
     * @param string $unMasked
     * @param string $masked
     */
    public function testMask($unMasked, $masked)
    {
        $cep = new CepType($unMasked);
        $this->assertEquals($masked, $cep->mask());
    }

    /**
     * @dataProvider providerMaskedAndUnMasked
     *
     * @param string $unMasked
     * @param string $masked
     */
    public function testUnMask($unMasked, $masked)
    {
        $cep = new CepType($masked);
        $this->assertEquals($unMasked, $cep->unMask());
    }
}
