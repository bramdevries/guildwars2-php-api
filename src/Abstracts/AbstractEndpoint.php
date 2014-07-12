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
     * Default set of options to pass with the request.
     * @var array
     */
    protected $options = array();

    /**
     * @param Client $client
     */
    public function __construct (Client $client)
    {
        $this->client = $client;

        $this->options = array(
            'query' => array(
                'lang' => $this->client->getLocale(),
            ),
        );

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

        if ($this->client->getVersion() == 'v1') {
            $endpoint .= '.json';
        }

        $options = array_merge($this->options, $options);

        return $this->get($endpoint, $options)->json();
    }
}
