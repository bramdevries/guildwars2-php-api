<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Build extends AbstractEndpoint
{
    /**
     * Returns the current build id of the game. This can be used to for example register when event timers reset due to server restarts.
     * @return array
     */
    public function build()
    {
        return $this->getResponse('build');
    }
}
