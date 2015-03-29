<?php

namespace GuildWars2\Abstracts;

use GuildWars2\Client;
use GuzzleHttp\Exception\ClientException;

abstract class AbstractRequest
{
	/**
	 * @var Client
	 */
	protected $client;

	/**
	 * @var string
	 */
	protected $version = 'v2';

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * @param       $verb
	 * @param       $url
	 * @param array $params
	 *
	 * @throws UnauthorizedException
	 * @throws ValidationException
	 */
	protected function request($verb, $url, $params = array())
	{
		$response = $this->client->$verb($this->version.'/'.$url, $params);
		$this->client->setResponse($response);

		return $response;
	}

	/**
	 * @param string $url
	 * @param array  $params
	 *
	 * @return mixed
	 */
	protected function post($url, $params = array())
	{
		$response = $this->request('post', $url, [
			'body' => $params
		]);

		return $response->json();
	}

	/**
	 * @param string $url
	 * @param array  $params
	 *
	 * @return mixed
	 */
	protected function get($url, $params = array())
	{
		$response = $this->request('get', $url, [
			'query' => $params
		]);

		return $response->json();
	}

	// Helpers

	/**
	 * @param $ids
	 *
	 * @return string
	 */
	protected function expandIds($ids)
	{
		if (is_array($ids)) {
			$ids = implode(',', $ids);

			return $ids;
		}

		return $ids;
	}

	/**
	 * @param int $size
	 *
	 * @return $this
	 */
	public function setPageSize($size = 25)
	{
		$this->client->setDefaultOption('query/page_size', $size);

		return $this;
	}

	/**
	 * @param int $page
	 *
	 * @return $this
	 */
	public function setPage($page = 1)
	{
		$this->client->setDefaultOption('query/page', $page);

		return $this;
	}
}