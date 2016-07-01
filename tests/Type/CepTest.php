<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\Cep;
use Lidercap\Core\Type\Maskable;

class CepTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(Maskable::class, new Cep());
    }

    /**
     * @return array
     */
    public function providerValidCeps()
    {
        return [
            ['00000-000'],
            ['11111-111'],
            ['01315-010'],
            ['01232-001'],
            ['05344-030'],
        ];
    }

    /**
     * @dataProvider providerValidCeps
     *
     * @param string $value
     */
    public function testIsValid($value)
    {
        $cep = new Cep($value);
        $this->assertTrue($cep->isValid());
    }

    /**
     * @return array
     */
    public function providerInValidCeps()
    {
        return [
            ['00000000'],
            ['1111-111'],
            ['11111-11'],
            ['01315-a10'],
            ['01232-0a1'],
            ['05344-03a'],
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
        new Cep($value);
    }

    /**
     * @dataProvider providerValidCeps
     *
     * @param string $value
     */
    public function testIsMasked($value)
    {
        $cep = new Cep($value);
        $this->assertTrue($cep->isMasked());
    }

    /**
     * @return array
     */
    public function providerMasks()
    {
        return [
            ['12345678', '12345-678'],
        ];
    }

    /**
     * @dataProvider providerMasks
     *
     * @param string $unMasked
     * @param string $masked
     */
    public function testMask($unMasked, $masked)
    {
        $cep = new Cep($unMasked);
        $this->assertEquals($masked, $cep->mask());
    }
}
