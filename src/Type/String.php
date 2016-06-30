<?php

namespace Lidercap\Core\Type;

/**
 * Core Type String.
 */
class String implements CoreTypeInterface
{
    use CoreTypeValueAware;

    /**
     * @return bool
     */
    public function isValid()
    {
        return is_string($this->value);
    }

    /**
     * @return int
     */
    public function length()
    {
        return strlen($this->value);
    }
}
