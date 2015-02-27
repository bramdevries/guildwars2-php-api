<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Build extends AbstractRequest
{

	/**
	 * @return mixed
	 */
	public function getBuild()
	{
		return $this->get('build');
	}

} 