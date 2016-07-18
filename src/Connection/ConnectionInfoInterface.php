<?php

namespace Lidercap\Core\Connection;

/**
 * Informações sobre a conexão.
 */
interface ConnectionInfoInterface
{
    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getApplication();

    /**
     * @codeCoverageIgnore
     *
     * @param string $application the application
     */
    public function setApplication($application);

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getServer();

    /**
     * @codeCoverageIgnore
     *
     * @param string $server the server
     */
    public function setServer($server);

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getDatabase();

    /**
     * @codeCoverageIgnore
     *
     * @param string $database the database
     */
    public function setDatabase($database);

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getIp();

    /**
     * @codeCoverageIgnore
     *
     * @param string $ip the ip
     */
    public function setIp($ip);

    /**
     * @param array $info
     */
    public function setConnectionInfo(array $info);
}
