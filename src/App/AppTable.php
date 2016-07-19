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
     * @return string|false
     */
    public static function get($composerName)
    {
        return isset(self::$apps[$composerName]) ? self::$apps[$composerName] : false;
    }

    /**
     * Converte o nome do app para o nome do composer.
     *
     * @param string $appName
     *
     * @return string|false
     */
    public static function getComposer($appName)
    {
        foreach (self::$apps as $composerName => $app) {
            if ($appName == $app) {
                return $composerName;
            }
        }

        return false;
    }

    /**
     * Obtém o nome do app corrente.
     *
     * @param string $file
     *
     * @return string|false
     */
    public function getCurrent($file = null)
    {
        if (is_null($file)) {
            $file = __DIR__ . '/../../../vendor/composer.json';
        }

        if (!is_file($file)) {
            return false;
        }

        $contents = file_get_contents($file);
        $contents = json_decode($contents, true);

        if (!isset($contents['name'])) {
            return false;
        }

        return self::get($contents['name']);
    }
}
