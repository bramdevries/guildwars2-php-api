<?php

namespace GuildWars2\Abstracts;

use GuildWars2\Client;

/**
 * Class AbstractEndpoint
 *
 * @package GuildWars2\Abstracts
 */
abstract class AbstractEndpoint extends \GuzzleHttp\Client
{
    /**
     * An instance of the API client.
     * @var \GuildWars2\Client
     */
    protected $client;

    /**
     * Default set of options to pass with the request.
     * @var array
     */
    protected $options = array();

    /**
     * Flag to determine if the instance is created via tests.
     *
     * @var boolean
     */
    protected $testing = false;

    /**
     * @param Client $client
     */
    public function __construct (Client $client)
    {
        $this->client = $client;

        $this->testing = $this->client->isTesting();

        $this->options = array(
            'query' => array(
                'lang' => $this->client->getLocale(),
            ),
        );

        parent::__construct(array(
            'base_url' => array($this->client->getUrl() . '/{version}/', array(
                'version' => $this->client->getVersion()
            )),
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

        $response = $this->get($endpoint, $options);

        // For tests we want the entire response object.
        if ($this->testing) {
            return $response;
        }

        return $response->json();
    }
}
