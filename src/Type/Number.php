<?php

namespace Lidercap\Core\Type;

/**
 * Core Type Number.
 */
class Number extends AbstractType
{
    use CoreTypeValueAware;

    /**
     * @return bool
     */
    public function isValid()
    {
        return is_numeric($this->value);
    }

    /**
     * @return int
     */
    public function length()
    {
        return strlen($this->value);
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'Número inválido';
    }
}
