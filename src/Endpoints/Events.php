<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Events extends AbstractEndpoint
{
    /**
     * Returns an unordered list of the localized event names for the specified language.
     *
     * @return Array
     */
    public function names()
    {
        return $this->getResponse('event_names');
    }

    /**
     * Returns static details about available events.
     *
     * @return Array
     */
    private function all()
    {
        return $this->getResponse('event_details');
    }

    /**
     * Returns static details about the event
     *
     * @param  string|null $event_id
     * @return Array
     */
    public function event($event_id = null)
    {
        if (is_null($event_id)) {
            return $this->all();
        }

        return $this->getResponse('event_details', array(
            'query' => array(
                'event_id' => $event_id,
            ),
        ));
    }
}
