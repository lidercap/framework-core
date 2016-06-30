<?php

namespace Lidercap\Core\Error;

/**
 * Adiciona um tratador de erro em qualquer classe.
 */
trait ErrorHandlerAware
{
    /**
     * @param string $error
     */
    public function addError($error)
    {
        ErrorHandler::getInstance()->addError($error);
    }

    /**
     * @return string
     */
    public function getLastError()
    {
        return ErrorHandler::getInstance()->getLastError();
    }

    /**
     * @param string $lastError
     */
    public function setLastError($lastError)
    {
        ErrorHandler::getInstance()->setLastError($lastError);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return ErrorHandler::getInstance()->getErrors();
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        ErrorHandler::getInstance()->setErrors($errors);
    }

    /**
     * @return void
     */
    public function clearErrors()
    {
        ErrorHandler::getInstance()->clearErrors();
    }
}
