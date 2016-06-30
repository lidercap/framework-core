<?php

namespace Lidercap\Core\Type;

/**
 * Core Type para números inteiros.
 */
class Int extends Number
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return is_int($this->value)     and
               !is_double($this->value) and
               !is_float($this->value);
    }
}
