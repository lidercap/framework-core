<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\AbstractType;
use Lidercap\Core\Type\StringType;
use Lidercap\Core\Type\UrlType;

class UrlTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new UrlType);
    }

    public function testExtends()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new StringType);
    }

    public function testContructDefaultValue()
    {
        new UrlType();
    }

    public function testContructNull()
    {
        new UrlType(null);
    }

    public function testEcho()
    {
        $value = 'http://empresa.com';
        $url   = new UrlType($value);

        ob_start();
        echo $url;

        $this->assertEquals($value, ob_get_clean());
    }

    /**
     * @return array
     */
    public function providerValidUrls()
    {
        return [
            ['https://empresa'],
            ['http://empresa'],

            ['https://empresa.com'],
            ['http://empresa.com'],

            ['https://empresa.com/'],
            ['http://empresa.com/'],

            ['https://empresa.com/sublevel'],
            ['http://empresa.com/sublevel'],

            ['https://empresa.com/sublevel/'],
            ['http://empresa.com/sublevel/'],

            ['https://empresa.com/sublevel/file'],
            ['http://empresa.com/sublevel/file'],

            ['https://empresa.com/sublevel/file.ext'],
            ['http://empresa.com/sublevel/file.ext'],
        ];
    }

    /**
     * @dataProvider providerValidUrls
     *
     * @param string $validUrl
     */
    public function testIsValid($validUrl)
    {
        $url = new UrlType($validUrl);
        $this->assertTrue($url->isValid());
    }

    /**
     * @return array
     */
    public function providerInvalidUrls()
    {
        return [
            ['empresa.com'],
            ['https://'],
            ['http://'],
            [''],
            [true],
            [false],
            [[]],
            [new \stdClass],
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Tipo de dado inválido
     * @expectedExceptionCode -1
     *
     * @dataProvider providerInvalidUrls
     *
     * @param string $invalidUrl
     */
    public function testIsInvalid($invalidUrl)
    {
        new UrlType($invalidUrl);
    }

    public function testGetSchemeHttp()
    {
        $url = new UrlType('http://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('http', $url->getScheme());
    }

    public function testGetSchemeHttps()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('https', $url->getScheme());
    }

    public function testGetUser()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('username', $url->getUser());
    }

    public function testGetPass()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('password', $url->getPass());
    }

    public function testGetHost()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('hostname', $url->getHost());
    }

    public function testGetPort()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('8080', $url->getPort());
    }

    public function testGetPath()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('/path', $url->getPath());
    }

    public function testQuery()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('arg=value', $url->getQuery());
    }

    public function testAnchor()
    {
        $url = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $this->assertEquals('anchor', $url->getAnchor());
    }

    public function testParse()
    {
        $url    = new UrlType('https://username:password@hostname:8080/path?arg=value#anchor');
        $parsed = $url->parse();

        $this->assertInternalType('array', $parsed);
        $this->assertCount(8, $parsed);

        $this->assertArrayHasKey('scheme', $parsed);
        $this->assertEquals('https', $parsed['scheme']);

        $this->assertArrayHasKey('user', $parsed);
        $this->assertEquals('username', $parsed['user']);

        $this->assertArrayHasKey('pass', $parsed);
        $this->assertEquals('password', $parsed['pass']);

        $this->assertArrayHasKey('host', $parsed);
        $this->assertEquals('hostname', $parsed['host']);

        $this->assertArrayHasKey('port', $parsed);
        $this->assertEquals('8080', $parsed['port']);

        $this->assertArrayHasKey('path', $parsed);
        $this->assertEquals('/path', $parsed['path']);

        $this->assertArrayHasKey('query', $parsed);
        $this->assertEquals('arg=value', $parsed['query']);

        $this->assertArrayHasKey('anchor', $parsed);
        $this->assertEquals('anchor', $parsed['anchor']);
    }
}
