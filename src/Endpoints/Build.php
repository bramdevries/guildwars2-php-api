<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Build extends AbstractEndpoint
{
    public function getBuild()
    {
        return $this->getResponse('build');
    }
}
