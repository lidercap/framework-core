<?php

namespace Lidercap\Core\Type;

/**
 * Core Type CEP.
 */
class CepType extends NumberType implements Maskable
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return (bool)preg_match('/^[0-9]{5}\-?[0-9]{3}$/', $this->value);
    }

    /**
     * Verifica se o dados está com máscara.
     *
     * @return true
     */
    public function isMasked()
    {
        return (bool)preg_match('/^[0-9]{5}\-[0-9]{3}$/', $this->value);
    }

    /**
     * Mascara o dado.
     *
     * @return string
     */
    public function mask()
    {
        $cep = trim($this->value);

        return substr($cep, 0, 5) . '-' . substr($cep, 5, 7);
    }

    /**
     * Retira a máscara do dado.
     *
     * @return string
     */
    public function unMask()
    {
        return str_replace('-', '', trim($this->value));
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'CEP inválido';
    }
}
