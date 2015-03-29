<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Continents extends AbstractRequest
{
	/**
	 * @param string $ids
	 *
	 * @return mixed
	 */
	public function find($ids = 'all')
	{
		return $this->get('continents', [
			'ids' => $this->expandIds($ids),
		]);
	}
}