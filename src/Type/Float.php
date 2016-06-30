<?php

namespace Lidercap\Core\Type;

/**
 * Core Type para números float.
 */
class Float extends Number
{
    /**
     * @param float $value
     */
    public function setValue($value = null)
    {
        $this->value = (float)$value;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return is_float($this->value);
    }
}
