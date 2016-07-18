<?php

namespace Lidercap\Tests\Core\Connection;

use Lidercap\Core\Connection\ConnectionInfoAware;

class ConnectionInfoAwareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ConnectionInfoAware
     */
    protected $trait;

    public function setUp()
    {
        $this->trait = $this->getMockForTrait(ConnectionInfoAware::class);
    }

    /**
     * @return array
     */
    public function providerConnectionInfo()
    {
        return [
            ['application-' . rand(1, 100), 'server-' . rand(1, 100), 'database-' . rand(1, 100), '127.0.0.1'],
        ];
    }

    /**
     * @dataProvider providerConnectionInfo
     *
     * @param string $application
     * @param string $server
     * @param string $database
     * @param string $ip
     */
    public function testSetConnectionInfo1($application, $server, $database, $ip)
    {
        $this->trait->setConnectionInfo(['application' => $application]);
        $this->assertEquals($application, $this->trait->getApplication());
    }

    /**
     * @dataProvider providerConnectionInfo
     *
     * @param string $application
     * @param string $server
     * @param string $database
     * @param string $ip
     */
    public function testSetConnectionInfo2($application, $server, $database, $ip)
    {
        $this->trait->setConnectionInfo(['server' => $server]);
        $this->assertEquals($server, $this->trait->getServer());
    }

    /**
     * @dataProvider providerConnectionInfo
     *
     * @param string $application
     * @param string $server
     * @param string $database
     * @param string $ip
     */
    public function testSetConnectionInfo3($application, $server, $database, $ip)
    {
        $this->trait->setConnectionInfo(['database' => $database]);
        $this->assertEquals($database, $this->trait->getDatabase());
    }

    /**
     * @dataProvider providerConnectionInfo
     *
     * @param string $application
     * @param string $server
     * @param string $database
     * @param string $ip
     */
    public function testSetConnectionInfo4($application, $server, $database, $ip)
    {
        $this->trait->setConnectionInfo(['ip' => $ip]);
        $this->assertEquals($ip, $this->trait->getIp());
    }
}
