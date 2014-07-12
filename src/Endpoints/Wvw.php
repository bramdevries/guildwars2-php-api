<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Wvw extends AbstractEndpoint
{
    /**
     * Returns a list of the currently running WvW matches, with the participating worlds included in the result
     *
     * @return Array
     */
    public function matches()
    {
        return $this->getResponse('wvw/matches');
    }

    /**
     * Returns further details about the specified match, including the total score and further details for each map.
     *
     * @param  string $match_id [description]
     * @return Array
     */
    public function match($match_id)
    {
        return $this->getResponse('wvw/match_details', [
            'query' => array('match_id' => $match_id),
        ]);
    }

    /**
     * Returns an unordered list of the localized WvW objective names.
     *
     * @return Array
     */
    public function objectives()
    {
        return $this->getResponse('wvw/objective_names');
    }
}
