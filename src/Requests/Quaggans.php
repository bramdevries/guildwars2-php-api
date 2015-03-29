<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Quaggans extends AbstractRequest
{

	/**
	 * @return mixed
	 */
	public function all()
	{
		return $this->get('quaggans');
	}

	/**
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function find($name)
	{
		return $this->get('quaggans/' . $name);
	}

}