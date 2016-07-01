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
            throw new \InvalidArgumentException('Tipo de dado inválido', -1);
        }
    }

    /**
     * @codeCoverageIgnore
     *
     * @return mixed
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }
}
