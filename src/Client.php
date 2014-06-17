<?php

namespace GuildWars2;

class Client
{

    /**
     * An array of options
     * @var Array
     */
    protected $options = array(
        "locale" => "en",
        "version" => "v1",
    );

    /**
     * Base URL
     * @var string
     */
    protected $url = "http://api.guildwars2.com";

    /**
     * Create a new instance of Client
     */
    public function __construct($options = array())
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * Entry point to get an endpoint
     * @param  String $endpoint
     * @return AbstractEndpoint
     */
    public function api($endpoint)
    {
        $instance = '\GuildWars2\Endpoints\\' . ucfirst($endpoint);

        if (class_exists($instance)) {
            return new $instance($this);
        } else {
            throw new \Exception('Endpoint could not be found');
        }
    }

    /**
     * Return the full URL.
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the version of the API.
     * @return String
     */
    public function getVersion()
    {
        return $this->options['version'];
    }

    /**
     * Get the language to return results in
     * @return String
     */
    public function getLocale()
    {
        return $this->options['locale'];
    }

    /**
     * Set the language to return results in.
     * @param string $locale
     */
    public function setLocale($locale = "en")
    {
        $this->options['locale'] = $locale;
    }
}
