<?php

namespace Lidercap\Core\Type;

/**
 * Core Type Number.
 */
class Number implements CoreTypeInterface
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
}
