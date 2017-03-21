<?php

namespace Lidercap\Core\Util;

/**
 * Classe proxy para as classes do pacote "Lidercap\Core\Type".
 */
abstract class AbstractUtil
{
    /**
     * @param array $arguments
     *
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        $object = self::getInstance($arguments);
        $method = new \ReflectionMethod($object, $method);

        return $method->invokeArgs($object, $arguments);
    }

    /**
     * @param array $arguments
     *
     * @return Object
     */
    protected static function getInstance(array $arguments)
    {
        $class = self::getClassPath();
        $value = $arguments[0];
        unset($arguments[0]);

        return new $class($value);
    }

    private static function getClassPath()
    {
        $type = @explode('\\', get_called_class());
        $type = str_replace('Util', '', end($type));
        $path = sprintf('\\Lidercap\\Core\\Type\\%sType', $type);

        return $path;
    }
}
