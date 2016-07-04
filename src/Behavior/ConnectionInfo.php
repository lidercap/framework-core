<?php

namespace Lidercap\Core\Behavior;

/**
 * Informações sobre a conexão.
 */
trait ConnectionInfo
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
     * Gets the value of application.
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
    protected function setApplication($application)
    {
        $this->application = $application;
    }

    /**
     * Gets the value of server.
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
    protected function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * Gets the value of database.
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
    protected function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * Gets the value of ip.
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
    protected function setIp($ip)
    {
        $this->ip = $ip;
    }
}
