<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new String);
    }

    public function testIsValid()
    {
        $string = new String('my string');
        $this->assertTrue($string->isValid());
    }

    public function testIsInvalid()
    {
        $string = new String(1);
        $this->assertFalse($string->isValid());
    }

    public function testLength()
    {
        $value  = 'this is my random string ' . rand(1, 100);
        $string = new String($value);

        $this->assertEquals(strlen($value), $string->length());
    }

    public function testTrim()
    {
        $value  = 'string';
        $string = new String(str_repeat(' ', rand(1, 100)) . $value . str_repeat(' ', rand(1, 100)));
        $this->assertEquals($value, $string->trim());
    }

    /**
     * @return array
     */
    public function providerLowerCase()
    {
        return [
            ['string', 'string'],
            ['STRING', 'string'],
            ['String', 'string'],
            ['StRinG', 'string'],
        ];
    }

    /**
     * @dataProvider providerLowerCase
     *
     * @param string $value
     * @param string $expected
     */
    public function testLowerCase($value, $expected)
    {
        $string = new String($value);
        $this->assertEquals($expected, $string->lowerCase());
    }

    /**
     * @return array
     */
    public function providerUpperCase()
    {
        return [
            ['STRING', 'STRING'],
            ['string', 'STRING'],
            ['String', 'STRING'],
            ['StRinG', 'STRING'],
        ];
    }

    /**
     * @dataProvider providerUpperCase
     *
     * @param string $value
     * @param string $expected
     */
    public function testUpperCase($value, $expected)
    {
        $string = new String($value);
        $this->assertEquals($expected, $string->upperCase());
    }

    /**
     * @return array
     */
    public function providerCapitalize()
    {
        return [
            ['STRING', 'String'],
            ['string', 'String'],
            ['String', 'String'],
            ['StRinG', 'String'],
        ];
    }

    /**
     * @dataProvider providerCapitalize
     *
     * @param string $value
     * @param string $expected
     */
    public function testCapitalize($value, $expected)
    {
        $string = new String($value);
        $this->assertEquals($expected, $string->capitalize());
    }

    public function testFirstChar1()
    {
        $value = 'value';
        $char  = '/';

        $string = new String($value);
        $this->assertEquals($char . $value, $string->firstChar($char));
    }

    public function testFirstChar2()
    {
        $value = '/value';
        $char  = '/';

        $string = new String($value);
        $this->assertEquals($value, $string->firstChar($char));
    }

    public function testLastChar1()
    {
        $value = 'value';
        $char  = '/';

        $string = new String($value);
        $this->assertEquals($value . $char, $string->lastChar($char));
    }

    public function testLastChar2()
    {
        $value = 'value/';
        $char  = '/';

        $string = new String($value);
        $this->assertEquals($value, $string->lastChar($char));
    }
}
