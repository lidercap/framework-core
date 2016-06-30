<?php

namespace Lidercap\Tests\Core\Error;

use Lidercap\Core\Error\ErrorHandler;

class ErrorHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultValue()
    {
        $errorHandler = ErrorHandler::getInstance();
        $this->assertCount(0, $errorHandler->getErrors());
    }
}
