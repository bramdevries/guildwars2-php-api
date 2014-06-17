<?php

namespace GuildWars2\Tests;

use GuildWars2\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected $instance;

    public function setUp()
    {
        $this->instance = new Client();
    }

    public function testInstance()
    {
        $this->assertInstanceOf('GuildWars2\Client', $this->instance);
    }

    public function testVersion ()
    {
        $this->assertEquals("v2", $this->instance->getVersion());

        $instanceForV1 = new Client(array(
            'version' => 'v1',
        ));

        $this->assertEquals("v1", $instanceForV1->getVersion());
    }

    public function testLocale()
    {
        // Default is english
        $this->assertEquals("en", $this->instance->getLocale());

        // Set it to Korean
        $this->instance->setLocale("ko");
        $this->assertEquals("ko", $this->instance->getLocale());

        // Set to france in the constructor

        $instanceInFrench = new Client(array(
            'locale' => 'fr',
        ));

        $this->assertEquals("fr", $instanceInFrench->getLocale());
    }
}
