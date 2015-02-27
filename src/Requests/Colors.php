<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Colors extends AbstractRequest
{

	/**
	 * @param string|array $ids
	 *
	 * @return mixed
	 */
	public function getColors($ids = 'all')
	{
		return $this->get('colors', [
			'ids' => $this->expandIds($ids),
		]);
	}

} 