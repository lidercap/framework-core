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

    public function testContructDefaultValue()
    {
        new String();
    }

    public function testContructNull()
    {
        new String(null);
    }

    public function testIsValid()
    {
        $string = new String('my string');
        $this->assertTrue($string->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Tipo de dado inválido
     * @expectedExceptionCode -1
     */
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

    public function testTruncate1()
    {
        $value  = 'abc';
        $string = new String($value);
        $this->assertEquals($value, $string->truncate(5));
    }

    public function testTruncate2()
    {
        $value  = 'abc';
        $string = new String($value);
        $this->assertEquals($value, $string->truncate(3));
    }

    public function testTruncate3()
    {
        $value  = 'abcdefghij';
        $string = new String($value);
        $this->assertEquals('abc', $string->truncate(3));
    }

    public function testTruncate4()
    {
        $value  = 'abcdefghij';
        $string = new String($value);
        $this->assertEquals('abc...', $string->truncate(3, '...'));
    }

    /**
     * @return array
     */
    public function providerClear()
    {
        return [
            ['á', 'a'],
            ['Á', 'A'],
            ['à', 'a'],
            ['À', 'A'],
            ['â', 'a'],
            ['Â', 'A'],
            ['ã', 'a'],
            ['Ã', 'A'],
            ['ä', 'a'],
            ['Ä', 'A'],
            ['é', 'e'],
            ['É', 'E'],
            ['è', 'e'],
            ['È', 'E'],
            ['ê', 'e'],
            ['Ê', 'E'],
            ['ë', 'e'],
            ['Ë', 'E'],
            ['í', 'i'],
            ['Í', 'I'],
            ['ì', 'i'],
            ['Ì', 'I'],
            ['î', 'i'],
            ['Î', 'I'],
            ['ĩ', 'i'],
            ['Ĩ', 'I'],
            ['ï', 'i'],
            ['Ï', 'I'],
            ['ó', 'o'],
            ['Ó', 'O'],
            ['ò', 'o'],
            ['Ò', 'O'],
            ['ô', 'o'],
            ['Ô', 'O'],
            ['õ', 'o'],
            ['Õ', 'O'],
            ['ö', 'o'],
            ['Ö', 'O'],
            ['ú', 'u'],
            ['Ú', 'U'],
            ['ù', 'u'],
            ['Ù', 'U'],
            ['û', 'u'],
            ['Û', 'U'],
            ['ũ', 'u'],
            ['Ũ', 'U'],
            ['ü', 'u'],
            ['Ü', 'U'],
            ['ç', 'c'],
            ['Ç', 'C'],
            ['ª', 'a'],
            ['º', 'o'],
            ['°', 'o'],
        ];
    }

    /**
     * @dataProvider providerClear
     *
     * @param string $value
     * @param string $expected
     */
    public function testClear($value, $expected)
    {
        $string = new String($value);
        $this->assertEquals($expected, $string->clear());
    }

    public function testExplode1()
    {
        $value    = 'string1,string2,string3';
        $expected = ['string1','string2','string3'];

        $string = new String($value);
        $array  = $string->explode();

        $this->assertInternalType('array', $array);
        $this->assertEquals($expected, $array);
    }

    public function testExplode2()
    {
        $value    = 'string1|string2|string3';
        $expected = ['string1','string2','string3'];

        $string = new String($value);
        $array  = $string->explode('|');

        $this->assertInternalType('array', $array);
        $this->assertEquals($expected, $array);
    }

    public function testJoin1()
    {
        $array    = ['string1','string2','string3'];
        $expected = 'string1,string2,string3';

        $string = new String();
        $string->join($array);

        $this->assertEquals($expected, $string->getValue());
    }

    public function testJoin2()
    {
        $array    = ['string1','string2','string3'];
        $expected = 'string1|string2|string3';

        $string = new String();
        $string->join($array, '|');

        $this->assertEquals($expected, $string->getValue());
    }
}
