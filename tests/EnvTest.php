<?php

namespace Lidercap\Tests\Core;

use Lidercap\Core\Env;

class EnvTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function providerEnvs1()
    {
        return [
            ['dev'        , 'development'],
            ['development', 'development'],

            ['stg'    , 'staging'],
            ['staging', 'staging'],

            ['prod'      , 'production'],
            ['production', 'production'],
        ];
    }

    /**
     * @dataProvider providerEnvs1
     *
     * @param string $given
     * @param string $expected
     */
    public function testGet($given, $expected)
    {
        $this->assertEquals($expected, Env::get($given));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Ambiente inválido: invalid
     * @expectedExceptionCode -1
     */
    public function testGetException()
    {
        Env::get('invalid');
    }

    /**
     * @return array
     */
    public function providerEnvs2()
    {
        return [
            ['dev'        , 'dev'],
            ['development', 'dev'],

            ['stg'    , 'stg'],
            ['staging', 'stg'],

            ['prod'      , 'prod'],
            ['production', 'prod'],
        ];
    }

    /**
     * @dataProvider providerEnvs2
     *
     * @param string $given
     * @param string $expected
     */
    public function testSymfony($given, $expected)
    {
        $this->assertEquals($expected, Env::symfony($given));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Ambiente inválido: invalid
     * @expectedExceptionCode -1
     */
    public function testSymfonyException()
    {
        Env::symfony('invalid');
    }
}
