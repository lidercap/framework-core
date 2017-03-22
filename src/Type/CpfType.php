<?php

namespace Lidercap\Core\Type;

/**
 * Core Type CPF.
 */
class CpfType extends NumberType implements Maskable
{
    /**
     * @return bool
     */
    public function isValid()
    {
        //Retirando a máscara.
        $cpf = $this->unMask($this->value);

        //Se houverem letras no CPF então já retorna false direto.
        if (!is_numeric($cpf)) {
            return false;
        }
        //Verificando combinações inválidas de CPF.

        $nulos = array(
            '12345678909','11111111111','22222222222','33333333333',
            '44444444444','55555555555','66666666666','77777777777',
            '88888888888','99999999999','00000000000'
        );
        if (in_array($cpf, $nulos)) {
            return false;
        }
        //Verificando combinações inválidas de CPF.

        //Calculando o primeiro dígito verificador.
        $acum = 0;
        for ($i = 0; $i < 9; $i++) {
            $acum += $cpf[$i] * (10-$i);
        }
        $x = $acum % 11;
        $acum = ($x > 1) ? (11 - $x) : 0;
        if ($acum != $cpf[9]) {
            return false;
        }
        //Calculando o primeiro dígito verificador.

        //Calcula o segundo dígito verificador.
        $acum = 0;
        for ($i = 0; $i < 10; $i++) {
            $acum += $cpf[$i] * (11 - $i);
        }
        $x = $acum % 11;
        $acum = ($x > 1) ? (11 - $x) : 0;
        if ($acum != $cpf[10]) {
            return false;
        }
        //Calcula o segundo dígito verificador.

        return true;
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
        return str_replace(['.', '-'], '', trim($this->value));
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return 'CPF inválido';
    }
}
