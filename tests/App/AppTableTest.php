<?php

namespace Lidercap\Tests\Core\App;

use Lidercap\Core\App\AppTable;

class AppTableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $file;

    public function setUp()
    {
        $this->file = __DIR__ . '/../../composer.json';
    }

    /**
     * @return array
     */
    public function providerApps()
    {
        return [
            ['telesena-warmup' , 'warmup'],
            ['telesena-backend', 'manager'],
        ];
    }

    /**
     * @dataProvider providerApps
     *
     * @param string $composerName
     * @param string $appName
     */
    public function testGetSuccess($composerName, $appName)
    {
        $this->assertEquals($appName, AppTable::get($composerName));
    }

    public function testGetFail()
    {
        $this->assertNull(AppTable::get('invalid'));
    }

    /**
     * @dataProvider providerApps
     *
     * @param string $composerName
     * @param string $appName
     */
    public function testGetComposerSuccess($composerName, $appName)
    {
        $this->assertEquals($composerName, AppTable::getComposer($appName));
    }

    public function testGetComposerFail()
    {
        $this->assertNull(AppTable::getComposer('invalid'));
    }

    public function testGetCurrentSuccess()
    {
        $this->assertEquals('framework-core', AppTable::getCurrent($this->file));
    }

    public function testGetCurrentFailFileNotExists()
    {
        $this->assertNull(AppTable::getCurrent('non-existent-file'));
    }

    public function testGetCurrentFailFileIsNotAValidJson()
    {
        $this->assertNull(AppTable::getCurrent(__FILE__));
    }
}
