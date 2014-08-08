<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Map extends AbstractEndpoint
{
    /**
     * Returns static information about the continents.
     *
     * @return Array
     */
    public function continents()
    {
        return $this->getResponse('continents');
    }

    /**
     * Returns details about maps in the game, including details about floor and translation data on how to translate between world coordinates and map coordinates.
     *
     * @return Array
     */
    private function all()
    {
        return $this->getResponse('maps');
    }

    /**
     * Returns details about a map in the game, including details about floor and translation data on how to translate between world coordinates and map coordinates.
     *
     * @param  string|null $map_id The map_id, defaults to all maps if no parameter is given
	 *
     * @return Array
     */
    public function maps($map_id = null)
    {
        if (is_null($map_id)) {
            return $this->all();
        }

        return $this->getResponse('maps', array(
            'query' => array(
                'map_id' => $map_id,
            ),
        ));
    }

    /**
     * This resource returns details about a map floor, used to populate a world map. All coordinates are map coordinates.
     *
     * @param  int $continent_id [description]
     * @param  int $floor        [description]
     * @return Array
     */
    public function floor($continent_id, $floor)
    {
        return $this->getResponse('map_floor', array(
            'query' => array(
                'continent_id' => $continent_id,
                'floor' => $floor,
            ),
        ));
    }

    /**
     * Returns an unordered list of the map names.
     *
     * @return Array
     */
    public function names()
    {
        return $this->getResponse('map_names');
    }
}
