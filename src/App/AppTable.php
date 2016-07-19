<?php

namespace Lidercap\Core\App;

/**
 * Consulta nomes de apps.
 */
class AppTable
{
    /**
     * Tabela com o nomes dos apps.
     *
     * @var array
     */
    protected static $apps = [
        'telesena-warmup'         => 'warmup',
        'telesena-backend'        => 'manager',
        'lidercap/framework-core' => 'framework-core',
    ];

    /**
     * Converte o nome do composer para o nome do app.
     *
     * @param string $composerName
     *
     * @return string|null
     */
    public static function get($composerName)
    {
        return isset(self::$apps[$composerName]) ? self::$apps[$composerName] : null;
    }

    /**
     * Converte o nome do app para o nome do composer.
     *
     * @param string $appName
     *
     * @return string|null
     */
    public static function getComposer($appName)
    {
        foreach (self::$apps as $composerName => $app) {
            if ($appName == $app) {
                return $composerName;
            }
        }

        return null;
    }

    /**
     * Obtém o nome do app corrente.
     *
     * @param string $file
     *
     * @return string|null
     */
    public static function getCurrent($file = null)
    {
        // @codeCoverageIgnoreStart
        if (is_null($file)) {
            $file = __DIR__ . '/../../../../../composer.json';
        }
        // @codeCoverageIgnoreEnd

        if (!is_file($file)) {
            return null;
        }

        $contents = file_get_contents($file);
        $contents = json_decode($contents, true);

        if (!isset($contents['name'])) {
            return null;
        }

        return self::get($contents['name']);
    }
}
