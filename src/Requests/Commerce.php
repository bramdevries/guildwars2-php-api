<?php

namespace GuildWars2\Requests;

use GuildWars2\Abstracts\AbstractRequest;

class Commerce extends AbstractRequest
{
	const CURRENCY_GEMS = 'gems';
	const CURRENCY_COINS = 'coins';

	/**
	 * @param int    $quantity
	 * @param string $currency
	 *
	 * @return mixed
	 */
	public function getExchange($quantity = 1, $currency = 'gems')
	{
		return $this->get(sprintf('commerce/exchange/%s', $currency), [
			'quantity' => $quantity
		]);
	}

	/**
	 * @param array|integer $ids
	 *
	 * @return mixed
	 */
	public function getListings($ids = [])
	{
		return $this->get('commerce/listings', [
			'ids' => $this->expandIds($ids),
		]);
	}

	/**
	 * @param array|integer $ids
	 *
	 * @return mixed
	 */
	public function getPrices($ids = [])
	{
		return $this->get('commerce/prices', [
			'ids' => $this->expandIds($ids),
		]);
	}
}