<?php

namespace Lidercap\Core\Type;

/**
 * Core Type ArrayType.
 */
class ArrayType implements CoreTypeInterface
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
}
