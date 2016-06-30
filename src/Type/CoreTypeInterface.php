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
    public function __construct($value = null);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $value
     */
    public function setValue($value = null);

    /**
     * @return bool
     */
    public function isValid();

    /**
     * @return int
     */
    public function length();
}
