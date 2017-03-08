<?php

namespace Lidercap\Core\Type;

abstract class AbstractType implements CoreTypeInterface
{
    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'Tipo de dado inválido';
    }

    /**
     * @return int
     */
    public function length()
    {
        return 0;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function __toString()
    {
        return serialize($this->getValue());
    }
}
