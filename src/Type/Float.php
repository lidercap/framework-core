<?php

namespace Lidercap\Core\Type;

/**
 * Core Type para números float.
 */
class Float extends Number
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return is_float($this->value);
    }
}
