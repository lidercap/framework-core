<?php

namespace Lidercap\Core\Type;

use Respect\Validation\Validator as v;

/**
 * Core Type CPF.
 */
class Cpf extends Number
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return v::cpf()->validate($this->value);
    }
}
