<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Items extends AbstractEndpoint
{
    /**
     * Returns a list of items that were discovered by players in the game
     *
     * @return Array
     */
    public function items()
    {
        return $this->getResponse('items');
    }

    /**
     * Returns details about a single item.
     *
     * @param  int $item_id
     * @return Array
     */
    public function item($item_id)
    {
        return $this->getResponse('item_details', array(
            'query' => array(
                'item_id' => $item_id,
            ),
        ));
    }

    /**
     * Returns a list of recipes that were discovered by players in the game
     *
     * @return Array
     */
    public function recipes()
    {
        return $this->getResponse('recipes');
    }

    /**
     * Returns details about a single recipe.
     *
     * @param  int $recipe_id
     * @return Array
     */
    public function recipe($recipe_id)
    {
        return $this->getResponse('recipe_details', array(
            'query' => array(
                'recipe_id' => $recipe_id,
            ),
        ));
    }

    /**
     * Returns a list of skins that are available in the game
     *
     * @return Array
     */
    public function skins()
    {
        return $this->getResponse('skins');
    }

    /**
     * Returns details about a single skin.
     *
     * @param  int $skin_id
     * @return Array
     */
    public function skin($skin_id)
    {
        return $this->getResponse('skin_details', array(
            'query' => array(
                'skin_id' => $skin_id,
            ),
        ));
    }
}
