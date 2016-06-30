<?php

namespace Lidercap\Tests\Core\Error;

use Lidercap\Core\Error\ErrorHandler;

class ErrorHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ErrorHandler
     */
    protected $errorHandler;

    public function setUp()
    {
        $this->errorHandler = ErrorHandler::getInstance();
    }

    public function tearDown()
    {
        $this->errorHandler->clearErrors();
    }

    public function testDefaultValue()
    {
        $errors = $this->errorHandler->getErrors();
        $this->assertInternalType('array', $errors);
        $this->assertCount(0, $errors);
    }

    public function testAddError1()
    {
        $error = 'this is my owesome error message ' . rand(1, 100);
        $this->errorHandler->addError($error);

        $errors = $this->errorHandler->getErrors();
        $this->assertInternalType('array', $errors);
        $this->assertCount(1, $errors);
        $this->assertEquals($error, $errors[0]);
    }

    public function testAddError2()
    {
        $error1 = 'this is my owesome error message ' . rand(1, 100);
        $this->errorHandler->addError($error1);

        $error2 = 'this is an other error message ' . rand(1, 100);
        $this->errorHandler->addError($error2);

        $errors = $this->errorHandler->getErrors();

        $this->assertInternalType('array', $errors);
        $this->assertCount(2, $errors);

        $this->assertEquals($error1, $errors[0]);
        $this->assertEquals($error2, $errors[1]);
    }

    public function testGetLastError()
    {
        $error1 = 'this is my owesome error message ' . rand(1, 100);
        $this->errorHandler->addError($error1);

        $error2 = 'this is an other error message ' . rand(1, 100);
        $this->errorHandler->addError($error2);

        $error3 = 'this is a last error message ' . rand(1, 100);
        $this->errorHandler->addError($error3);

        $lastError = $this->errorHandler->getLastError();

        $this->assertInternalType('string', $lastError);
        $this->assertEquals($error3, $lastError);
    }

    public function testSetErrors()
    {
        $this->errorHandler->addError('this is my owesome error message ' . rand(1, 100));
        $this->errorHandler->addError('this is an other error message ' . rand(1, 100));
        $this->errorHandler->addError('this is a last error message ' . rand(1, 100));

        $errors = $this->errorHandler->getErrors();

        $otherErrors = ['this is an other error list'];
        $this->errorHandler->setErrors($otherErrors);

        $this->assertEquals($otherErrors, $this->errorHandler->getErrors());
    }
}
