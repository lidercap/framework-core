<?php

namespace Lidercap\Core\Type;

trait CoreTypeValueAware
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function setValue($value = null)
    {
        $this->value = $value
    }
}
