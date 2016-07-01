<?php

namespace Lidercap\Core\Type;

/**
 * Core Type ArrayType.
 */
class ArrayType extends AbstractType
{
    use CoreTypeValueAware;

    /**
     * @return bool
     */
    public function isValid()
    {
        return is_array($this->value);
    }

    /**
     * @return int
     */
    public function length()
    {
        return count($this->value);
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'Array inválido';
    }
}
