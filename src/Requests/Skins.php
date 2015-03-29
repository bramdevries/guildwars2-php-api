<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Skins extends AbstractRequest
{

	/**
	 * @param array $ids
	 *
	 * @return mixed
	 */
	public function find($ids = [])
	{
		return $this->get('skins', [
			'ids' => $this->expandIds($ids),
		]);
	}
}