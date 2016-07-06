<?php

namespace Lidercap\Core;

/**
 * Conversor de nomes de ambientes.
 */
class Env
{
    /**
     * Padrão encurtado do Symfony para o padrão longo.
     *
     * @param string $env
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public static function get($env)
    {
        switch ($env) {
            case 'prod':
            case 'production':
                return 'production';
            case 'stg':
            case 'staging':
                return 'staging';
            case 'dev':
            case 'development':
                return 'development';
        }

        $message = sprintf('Ambiente inválido: %s', $env);
        throw new \InvalidArgumentException($message, -1);
    }

    /**
     * Padrão longo para o padrão encurtado do Symfony.
     *
     * @param string $env
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public static function symfony($env)
    {
        switch ($env) {
            case 'prod':
            case 'production':
                return 'prod';
            case 'stg':
            case 'staging':
                return 'stg';
            case 'dev':
            case 'development':
                return 'dev';
        }

        $message = sprintf('Ambiente inválido: %s', $env);
        throw new \InvalidArgumentException($message, -1);
    }
}
