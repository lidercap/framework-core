<?php

namespace Lidercap\Core\Type;

use Lidercap\Core\Pattern\Validatable;

/**
 * Interface para core types.
 */
interface CoreTypeInterface extends Validatable
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
     *
     * @throws \InvalidArgumentException
     */
    public function setValue($value = null);

    /**
     * @return int
     */
    public function length();

    /**
     * @return string
     */
    public function getErrorMessage();
}
