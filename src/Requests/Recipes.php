<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Recipes extends AbstractRequest
{
	const SEARCH_INPUT = 'input';
	const SEARCH_OUTPUT = 'output';

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

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function searchOutput($id)
	{
		return $this->search($id, static::SEARCH_OUTPUT);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function searchInput($id)
	{
		return $this->search($id, static::SEARCH_INPUT);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	protected function search($id, $type)
	{
		return $this->get('recipes/search', [
			$type => $id
		]);
	}
}