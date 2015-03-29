<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Wvw extends AbstractRequest
{
	/**
	 * @var string
	 */
	protected $version = 'v1';

	/**
	 * @return mixed
	 */
	public function matches()
	{
		return $this->get('wvw/matches.json');
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function match($id)
	{
		return $this->get('wvw/match_details.json', [
			'match_id' => $id
		]);
	}

	/**
	 * @return mixed
	 */
	public function objectives()
	{
		return $this->get('wvw/objective_names.json');
	}

}