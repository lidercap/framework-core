<?php

namespace Lidercap\Core\Error;

use Lidercap\Core\Pattern;

/**
 * Tratador de erros.
 */
class ErrorHandler implements ErrorHandlerInterface
{
    use Pattern\Singleton;

    /**
     * @var string
     */
    protected $lastError = null;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @return string
     */
    public function getLastError()
    {
        return $this->lastError;
    }

    /**
     * @param string $lastError
     */
    public function setLastError($lastError)
    {
        $this->lastError = $lastError;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }
}
