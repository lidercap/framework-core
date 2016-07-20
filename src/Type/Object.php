<?php

namespace Lidercap\Core\Type;

/**
 * Core Type Object.
 */
class Object extends AbstractType
{
    use CoreTypeValueAware;

    /**
     * @return bool
     */
    public function isValid()
    {
        return is_object($this->value);
    }

    /**
     * Obtém o nome do objeto sem o namespace.
     *
     * @return string
     */
    public function getBasename()
    {
        $reflection = new \ReflectionClass($this->value);

        return $reflection->getShortName();
    }

    /**
     * Obtém o namespace do objeto.
     *
     * @return string
     */
    public function getNamespace()
    {
        $reflection = new \ReflectionClass($this->value);

        return $reflection->getNamespaceName();
    }

    /**
     * Obtém o caminho completo para o objeto, com namespace e tudo.
     *
     * @return string
     */
    public function getPath()
    {
        return get_class($this->value);
    }
}
