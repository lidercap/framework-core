<?php

namespace Lidercap\Tests\Core\Type;

use Lidercap\Core\Type\CoreTypeInterface;
use Lidercap\Core\Type\StringType;

class StringTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(CoreTypeInterface::class, new StringType);
    }

    public function testContructDefaultValue()
    {
        new StringType();
    }

    public function testContructNull()
    {
        new StringType(null);
    }

    public function testEcho()
    {
        $value  = 'my string ' . rand(1, 100);
        $string = new StringType($value);

        ob_start();
        echo $string;

        $this->assertEquals($value, ob_get_clean());
    }

    public function testIsValid()
    {
        $string = new StringType('my string');
        $this->assertTrue($string->isValid());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Tipo de dado inválido
     * @expectedExceptionCode -1
     */
    public function testIsInvalid()
    {
        $string = new StringType(1);
    }

    /**
     * @return array
     */
    public function providerMatches()
    {
        return [
            ['123.456.789-12', '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'],
            ['01/02/2003', '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/'],
        ];
    }

    /**
     * @dataProvider providerMatches
     *
     * @param string $value
     * @param string $regex
     */
    public function testMatch($value, $regex)
    {
        $string = new StringType($value);
        $this->assertTrue($string->match($regex));
    }

    /**
     * @dataProvider providerMatches
     *
     * @param string $value
     * @param string $regex
     */
    public function testNotMatch($value, $regex)
    {
        $junk   = md5(microtime());
        $string = new StringType($value . $junk);
        $this->assertFalse($string->match($regex));
    }

    public function testLength()
    {
        $value  = 'this is my random string ' . rand(1, 100);
        $string = new StringType($value);

        $this->assertEquals(strlen($value), $string->length());
    }

    public function testTrim()
    {
        $value  = 'string';
        $string = new StringType(str_repeat(' ', rand(1, 100)) . $value . str_repeat(' ', rand(1, 100)));
        $this->assertEquals($value, $string->trim());
    }

    /**
     * @return array
     */
    public function providerReplace()
    {
        return [
            ['hello world fulano', 'fulano', 'beltrano', 'hello world beltrano'],
            ['123.456.789-12', ['-', '.'], '', '12345678912'],
            [
                'You should eat fruits, vegetables, and fiber every day',
                ['fruits', 'vegetables', 'fiber'],
                ['pizza', 'beer', 'ice cream'],
                'You should eat pizza, beer, and ice cream every day'
            ],
        ];
    }

    /**
     * @dataProvider providerReplace
     *
     * @param string       $phrase
     * @param array|string $search
     * @param array|string $replace
     * @param string       $expected
     */
    public function testReplace($phrase, $search, $replace, $expected)
    {
        $string = new StringType($phrase);
        $this->assertEquals($expected, $string->replace($search, $replace));
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
        $string = new StringType($value);
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
        $string = new StringType($value);
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
        $string = new StringType($value);
        $this->assertEquals($expected, $string->capitalize());
    }

    public function testFirstChar1()
    {
        $value = 'value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($char . $value, $string->firstChar($char));
    }

    public function testFirstChar2()
    {
        $value = '/value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($value, $string->firstChar($char));
    }

    public function testFirstCharIsNot1()
    {
        $value = '/value';
        $not   = 'value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($not, $string->firstCharIsNot($char));
    }

    public function testFirstCharIsNot2()
    {
        $value = 'value';
        $not   = 'value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($not, $string->firstCharIsNot($char));
    }

    public function testLastChar1()
    {
        $value = 'value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($value . $char, $string->lastChar($char));
    }

    public function testLastChar2()
    {
        $value = 'value/';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($value, $string->lastChar($char));
    }

    public function testLastCharIsNot1()
    {
        $value = 'value/';
        $not   = 'value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($not, $string->lastCharIsNot($char));
    }

    public function testLastCharIsNot2()
    {
        $value = 'value';
        $not   = 'value';
        $char  = '/';

        $string = new StringType($value);
        $this->assertEquals($not, $string->lastCharIsNot($char));
    }

    public function testTruncate1()
    {
        $value  = 'abc';
        $string = new StringType($value);
        $this->assertEquals($value, $string->truncate(5));
    }

    public function testTruncate2()
    {
        $value  = 'abc';
        $string = new StringType($value);
        $this->assertEquals($value, $string->truncate(3));
    }

    public function testTruncate3()
    {
        $value  = 'abcdefghij';
        $string = new StringType($value);
        $this->assertEquals('abc', $string->truncate(3));
    }

    public function testTruncate4()
    {
        $value  = 'abcdefghij';
        $string = new StringType($value);
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
        $string = new StringType($value);
        $this->assertEquals($expected, $string->clear());
    }

    public function testExplode1()
    {
        $value    = 'string1,string2,string3';
        $expected = ['string1','string2','string3'];

        $string = new StringType($value);
        $array  = $string->explode();

        $this->assertInternalType('array', $array);
        $this->assertEquals($expected, $array);
    }

    public function testExplode2()
    {
        $value    = 'string1|string2|string3';
        $expected = ['string1','string2','string3'];

        $string = new StringType($value);
        $array  = $string->explode('|');

        $this->assertInternalType('array', $array);
        $this->assertEquals($expected, $array);
    }

    public function testJoin1()
    {
        $array    = ['string1','string2','string3'];
        $expected = 'string1,string2,string3';

        $string = new StringType();
        $string->join($array);

        $this->assertEquals($expected, $string->getValue());
    }

    public function testJoin2()
    {
        $array    = ['string1','string2','string3'];
        $expected = 'string1|string2|string3';

        $string = new StringType();
        $string->join($array, '|');

        $this->assertEquals($expected, $string->getValue());
    }
}
