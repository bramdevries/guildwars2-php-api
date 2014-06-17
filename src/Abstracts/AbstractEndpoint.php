<?php

namespace GuildWars2\Abstracts;

use GuildWars2\Client;

abstract class AbstractEndpoint extends \GuzzleHttp\Client
{
    /**
     * An instance of the API client.
     * @var GuildWars2\Client
     */
    protected $client;

    /**
     * @param Client $client [description]
     */
    public function __construct (Client $client)
    {
        $this->client = $client;

        parent::__construct(array(
            'base_url' => [$this->client->getUrl() . '/{version}/', ['version' => $this->client->getVersion()]],
        ));
    }

    /**
     * Get the response from the API endpoint
     * @param string $endpoint
     * @param array $options
     * @return Array
     */
    public function getResponse($endpoint, $options = array())
    {

        if ($this->client->getVersion() == "v1") {
            $endpoint .= ".json";
        }

        $response = $this->get($endpoint, $options);

        return $response;
    }
}
