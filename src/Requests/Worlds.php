<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Worlds extends AbstractRequest
{
	/**
	 * @param string $ids
	 *
	 * @return mixed
	 */
	public function find($ids = 'all')
	{
		return $this->get('worlds', [
			'ids' => $this->expandIds($ids),
		]);
	}
}