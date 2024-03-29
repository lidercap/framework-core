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
     * @throws \InvalidArgumentException
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
     * @throws \InvalidArgumentException
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        if (!is_null($value) and !$this->isValid()) {
            $this->value = null;
            throw new \InvalidArgumentException($this->getErrorMessage(), -1);
        }
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
