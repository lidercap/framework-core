<?php

namespace Lidercap\Core\Type;

/**
 * Interface que define o uso de máscaras em tipos de dados.
 */
interface Maskable
{
    /**
     * Verifica se o dados está com máscara.
     *
     * @return bool
     */
    public function isMasked();

    /**
     * Mascara o dado.
     *
     * @return string
     */
    public function mask();

    /**
     * Retira a máscara do dado.
     *
     * @return string
     */
    public function unMask();
}
