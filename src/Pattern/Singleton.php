<?php

namespace Lidercap\Core\Pattern;

/**
 * Pattern de Singleton.
 *
 * @link https://pt.wikipedia.org/wiki/Singleton
 */
trait Singleton
{
    /**
     * @var $this|false
     */
    protected static $instance = false;

    /**
     * Construct is protected to non-singleton instance.
     */
    protected function __construct()
    {
        // Nothing to do here...
    }

    /**
     * @return $this
     */
    final public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
