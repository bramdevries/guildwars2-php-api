<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Recipes extends AbstractRequest
{

	/**
	 * @param array $ids
	 *
	 * @return mixed
	 */
	public function find($ids = [])
	{
		return $this->get('recipes', [
			'ids' => $this->expandIds($ids),
		]);
	}

}