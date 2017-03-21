<?php

namespace Lidercap\Core\Type;

/**
 * Core Type URL.
 */
class UrlType extends StringType
{
    /**
     * @return bool
     */
    public function isValid()
    {
        return (!filter_var($this->value, FILTER_VALIDATE_URL) === false);
    }

    /**
     * @return array
     */
    public function getScheme()
    {
        return parse_url($this->value, PHP_URL_SCHEME);
    }

    /**
     * @return array
     */
    public function getUser()
    {
        return parse_url($this->value, PHP_URL_USER);
    }

    /**
     * @return array
     */
    public function getPass()
    {
        return parse_url($this->value, PHP_URL_PASS);
    }

    /**
     * @return array
     */
    public function getHost()
    {
        return parse_url($this->value, PHP_URL_HOST);
    }

    /**
     * @return array
     */
    public function getPort()
    {
        return parse_url($this->value, PHP_URL_PORT);
    }

    /**
     * @return array
     */
    public function getPath()
    {
        return parse_url($this->value, PHP_URL_PATH);
    }

    /**
     * @return array
     */
    public function getQuery()
    {
        return parse_url($this->value, PHP_URL_QUERY);
    }

    /**
     * @return array
     */
    public function getAnchor()
    {
        return parse_url($this->value, PHP_URL_FRAGMENT);
    }

    /**
     * Parseia uma URL.
     *
     * @return array
     */
    public function parse()
    {
        return [
            'scheme' => $this->getScheme(),
            'user'   => $this->getUser(),
            'pass'   => $this->getPass(),
            'host'   => $this->getHost(),
            'port'   => $this->getPort(),
            'path'   => $this->getPath(),
            'query'  => $this->getQuery(),
            'anchor' => $this->getAnchor(),
        ];
    }
}
