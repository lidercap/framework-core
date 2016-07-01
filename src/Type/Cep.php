<?php

namespace Lidercap\Core\Type;

/**
 * Core Type CEP.
 */
class Cep extends Number implements Maskable
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return (bool)preg_match('/^[0-9]{5}\-[0-9]{3}$/', $this->value);
    }

    /**
     * Verifica se o dados está com máscara.
     *
     * @return true
     */
    public function isMasked()
    {
        return true;
    }

    /**
     * Mascara o dado.
     *
     * @return string
     */
    public function mask()
    {

    }

    /**
     * Retira a máscara do dado.
     *
     * @return string
     */
    public function unMask()
    {

    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'CEP inválido';
    }
}
