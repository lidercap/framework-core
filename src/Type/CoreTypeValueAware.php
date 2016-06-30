<?php

namespace Lidercap\Core\Type;

trait CoreTypeValueAware
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @codeCoverageIgnore
     *
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @codeCoverageIgnore
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function setValue($value = null)
    {
        $this->value = $value;
    }
}
