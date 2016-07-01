<?php

namespace Lidercap\Core\Type;

use Respect\Validation\Validator as v;

/**
 * Core Type CPF.
 */
class Cpf extends Number implements Maskable
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return v::cpf()->validate($this->value);
    }

    /**
     * Verifica se o dados está com máscara.
     *
     * @return bool
     */
    public function isMasked()
    {
        return (bool)preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/', $this->value);
    }

    /**
     * Mascara o dado.
     *
     * @return string
     */
    public function mask()
    {
        $cpf = trim($this->value);

        return substr($cpf, 0, 3) . '.' .
               substr($cpf, 3, 3) . '.' .
               substr($cpf, 6, 3) . '-' .
               substr($cpf, 9, 2);
    }

    /**
     * Retira a máscara do dado.
     *
     * @return string
     */
    public function unMask()
    {
        return str_replace(array('.', '-'), '', trim($this->value));
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'CPF inválido';
    }
}
