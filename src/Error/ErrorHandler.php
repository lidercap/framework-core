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
     * @var array
     */
    protected $errors = [];

    /**
     * @param string $error
     */
    public function addError($error)
    {
        array_push($this->errors, $error);
    }

    /**
     * @return string
     */
    public function getLastError()
    {
        return end($this->errors);
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

    /**
     * @return void
     */
    public function clearErrors()
    {
        $this->errors = [];
    }
}
