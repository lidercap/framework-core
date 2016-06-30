<?php

namespace Lidercap\Core\Type;

/**
 * Interface para core types.
 */
interface CoreTypeInterface
{
    /**
     * @param mixed $value
     */
    public function __construct($initialValue = null);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $newValue
     *
     * @return mixed
     */
    public function setValue($newValue = null);

    /**
     * @return bool
     */
    public function isValid();

    /**
     * @return int
     */
    public function length();
}
