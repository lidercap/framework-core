<?php

namespace Lidercap\Core\Error;

/**
 * Interface para tratadores de erro.
 */
interface ErrorHandlerInterface
{
    /**
     * @param string $error
     */
    public function addError($error);

    /**
     * @return string
     */
    public function getLastError();

    /**
     * @param string $lastError
     */
    public function setLastError($lastError);

    /**
     * @return array
     */
    public function getErrors();

    /**
     * @param array $errors
     */
    public function setErrors(array $errors);

    /**
     * @return void
     */
    public function clearErrors();
}
