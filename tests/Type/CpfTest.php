<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\Cpf;
use Lidercap\Core\Type\Maskable;

class CpfTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(Maskable::class, new Cpf());
    }

    /**
     * @return array
     */
    public function providerValidCpfs()
    {
        return [
            ['897.478.455-63'],
            ['89747845563'],
            [89747845563],

            ['353.584.816-48'],
            ['35358481648'],
            [35358481648],

            ['894.254.992-68'],
            ['89425499268'],
            [89425499268],
        ];
    }

    /**
     * @dataProvider providerValidCpfs
     *
     * @param string $cpf
     */
    public function testIsValid($cpf)
    {
        new Cpf($cpf);
    }

    /**
     * @return array
     */
    public function providerInvalidCpfs()
    {
        return [
            [''],
            ['111.111.111-11'],
            ['11111111111'],
            ['222.222.222-22'],
            ['22222222222'],
            ['333.333.333-33'],
            ['33333333333'],
            ['444.444.444-44'],
            ['44444444444'],
            ['555.555.555-55'],
            ['55555555555'],
            ['666.666.666-66'],
            ['66666666666'],
            ['777.777.777-77'],
            ['77777777777'],
            ['888.888.888-88'],
            ['88888888888'],
            ['999.999.999-99'],
            ['99999999999'],
            ['000.000.000-00'],
            ['00000000000'],
            ['897.478.455-64'],
            ['89747845564'],
            ['353.584.816-49'],
            ['35358481649'],
            ['894.254.992-69'],
            ['89425499269'],
            ['897.478.455-64'],
            ['89747845564'],
            ['353.584.816-49'],
            ['35358481649'],
            ['894.254.992-69'],
            ['89425499269'],
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CPF inválido
     * @expectedExceptionCode -1
     *
     * @dataProvider providerInvalidCpfs
     *
     * @param string $cpf
     */
    public function testIsInvalid($cpf)
    {
        new Cpf($cpf);
    }

    /**
     * @return array
     */
    public function providerValidMaskedCpfs()
    {
        return [
            ['897.478.455-63'],
            ['353.584.816-48'],
            ['894.254.992-68'],
        ];
    }

    /**
     * @dataProvider providerValidMaskedCpfs
     *
     * @param string $value
     */
    public function testIsMaked($value)
    {
        $cpf = new Cpf($value);
        $this->assertTrue($cpf->isMasked());
    }

    /**
     * @return array
     */
    public function providerValidUnMaskedCpfs()
    {
        return [
            ['89747845563'],
            [89747845563],
            ['35358481648'],
            [35358481648],
            ['89425499268'],
            [89425499268],
        ];
    }

    /**
     * @dataProvider providerValidUnMaskedCpfs
     *
     * @param string $value
     */
    public function testIsUnMaked($value)
    {
        $cpf = new Cpf($value);
        $this->assertFalse($cpf->isMasked());
    }

    /**
     * @return array
     */
    public function providerMasks()
    {
        return [
            ['897.478.455-63', '89747845563'],
            ['353.584.816-48', '35358481648'],
            ['894.254.992-68', '89425499268'],
        ];
    }

    /**
     * @dataProvider providerMasks
     *
     * @param string $masked
     * @param string $unMasked
     */
    public function testMask($masked, $unMasked)
    {
        $cpf = new Cpf($unMasked);
        $this->assertEquals($masked, $cpf->mask());
    }

    /**
     * @dataProvider providerMasks
     *
     * @param string $masked
     * @param string $unMasked
     */
    public function testUnMask($masked, $unMasked)
    {
        $cpf = new Cpf($masked);
        $this->assertEquals($unMasked, $cpf->unMask());
    }
}
