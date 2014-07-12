<?php

namespace GuildWars2\Tests;

use GuildWars2\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected $instance;

    public function setUp()
    {
        $this->instance = new Client(array(
            'testing' => true,
        ));
    }

    public function testInstance()
    {
        $this->assertInstanceOf('GuildWars2\Client', $this->instance);
    }

    public function testVersion ()
    {
        $this->assertEquals("v1", $this->instance->getVersion());

        $instanceForV1 = new Client(array(
            'version' => 'v2',
        ));

        $this->assertEquals("v2", $instanceForV1->getVersion());
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

    public function testUrl()
    {
        $this->assertEquals('http://api.guildwars2.com', $this->instance->getUrl());
    }

    public function testEndpoints()
    {
        // Load a fixture of endpoints.
        $endpoints = json_decode(file_get_contents("tests/endpoints.json"), true);

        foreach ($endpoints as $endpoint) {

            // Create and instance for the endpoint.
            $instance = $this->getEndpoint($endpoint['endpoint']);

            // Test if the correct instance has been created.
            $expectedInstance = 'GuildWars2\Endpoints\\' . ucfirst($endpoint['endpoint']);
            $this->assertInstanceOf($expectedInstance, $instance);

            // Set the parameters
            $params = (isset($endpoint['parameters'])) ? $endpoint['parameters'] : array();

            $response = call_user_func_array(array($instance, $endpoint['method']), $params);

            // Test if the request was succesfull.
            $this->assertEquals(200, $response->getStatusCode());
        }
    }

    public function testRenderService()
    {
        $files = $this->getEndpoint('files');

        $url = $files->file('943538394A94A491C8632FBEF6203C2013443555', 102478);

        $this->assertEquals("https://render.guildwars2.com/file/943538394A94A491C8632FBEF6203C2013443555/102478.png", $url);
    }

    public function testResponseIsArray()
    {
        $instance = new Client();

        $response = $instance->api('build')->build();

        $this->assertTrue(is_array($response));
    }

    /**
     * @expectedException Exception
     */
    public function testEndpointNotFound()
    {
        $this->getEndpoint('Fake');
    }

    private function getEndpoint($api)
    {
        return $this->instance->api($api);
    }
}
