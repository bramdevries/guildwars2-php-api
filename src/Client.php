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
        "version" => "v2",
    );

    /**
     * Create a new instance of Client
     */
    public function __construct($options = array())
    {
        $this->options = array_merge($this->options, $options);
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
