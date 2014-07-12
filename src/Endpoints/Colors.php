<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Colors extends AbstractEndpoint
{
    /**
     * Returns all dyes in the game, including localized names and their color component information.
     * @return Array
     */
    public function colors()
    {
        return $this->getResponse('colors');
    }
}
