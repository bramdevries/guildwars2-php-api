<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Guild extends AbstractEndpoint
{
    /**
     * Returns details about a guild, by using the name.
     *
     * @param string $name
     * @return Array
     */
    public function byName($name)
    {
        return $this->getResponse('guild_details', array(
            'query' => array(
                'guild_name' => $name,
            ),
        ));
    }

    /**
     * Returns details about a guild, by using the id
     *
     * @param string $id
     * @return Array
     */
    public function byId($id)
    {
        return $this->getResponse('guild_details', array(
            'query' => array(
                'guild_id' => $id,
            ),
        ));
    }


}
