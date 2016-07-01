<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\Cpf;

class CpfTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValidMasked()
    {
        new Cpf('450.945.879-78');
    }

    public function testIsValidUnMaskedString()
    {
        new Cpf('45094587978');
    }

    public function testIsValidUnMaskedNumber()
    {
        new Cpf(45094587978);
    }
}
