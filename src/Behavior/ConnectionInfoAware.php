<?php

namespace Lidercap\Core\Behavior;

/**
 * Informações sobre a conexão.
 */
trait ConnectionInfoAware
{
    /**
     * @var string
     */
    protected $application = null;

    /**
     * @var string
     */
    protected $server = null;

    /**
     * @var string
     */
    protected $database = null;

    /**
     * @var string
     */
    protected $ip = null;

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string $application the application
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string $server the server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string $database the database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string $ip the ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @param array $info
     */
    public function setConnectionInfo(array $info)
    {
        if (isset($info['application'])) {
            $this->setApplication($info['application']);
        }

        if (isset($info['server'])) {
            $this->setServer($info['server']);
        }

        if (isset($info['database'])) {
            $this->setDatabase($info['database']);
        }

        if (isset($info['ip'])) {
            $this->setIp($info['ip']);
        }
    }
}
