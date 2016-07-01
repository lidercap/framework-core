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
}
