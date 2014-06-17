<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Colors extends AbstractEndpoint
{
    public function getAll()
    {
        return $this->getResponse('colors');
    }
}
