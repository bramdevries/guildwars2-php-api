<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Maps extends AbstractRequest
{
	/**
	 * @param array $ids
	 *
	 * @return mixed
	 */
	public function find($ids = [])
	{
		return $this->get('maps', [
			'ids' => $this->expandIds($ids),
		]);
	}
}