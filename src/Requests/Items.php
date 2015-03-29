<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Items extends AbstractRequest
{
	/**
	 * @return mixed
	 */
	public function all()
	{
		return $this->get('items');
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function find($id)
	{
		return $this->get('items/' . $id);
	}

}