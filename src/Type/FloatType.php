<?php

namespace Lidercap\Core\Type;

/**
 * Core Type para números float.
 */
class FloatType extends NumberType
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return is_float($this->value);
    }
}
