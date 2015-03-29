<?php

namespace GuildWars2;

use GuzzleHttp\Client as AbstractClient;

/**
 * Class Client
 * @method Requests\Build build()
 * @method Requests\Colors colors()
 * @method Requests\Commerce commerce()
 * @method Requests\Worlds worlds()
 * @method Requests\Quaggans quaggans()
 * @method Requests\Items items()
 * @method Requests\Recipes recipes()
 * @method Requests\Skins skins()
 * @method Requests\Continents continents()
 * @method Requests\Maps maps()
 * @method Requests\Wvw wvw()
 *
 * @author  Bram Devries <bram@madewithlove.be>
 * @package GuildWars2
 */
class Client extends AbstractClient
{
	/**
	 * @var
	 */
	protected $response;

	/**
	 * @var array
	 */
	protected $config = [
		'base_url' => 'https://api.guildwars2.com/'
	];

	/**
	 * @param array $config
	 */
	public function __construct(array $config = [])
	{
		parent::__construct(array_merge_recursive($config, $this->config));
	}

	/**
	 * @param $lang
	 */
	public function setLanguage($lang)
	{
		$this->setDefaultOption('query/lang', $lang);
	}

	/**
	 * @param $name
	 */
	public function api($name)
	{
		$className = 'GuildWars2\Requests\\'.ucfirst($name);

		if (class_exists($className)) {
			return new $className($this);
		}

		throw new \InvalidArgumentException(sprintf('%s does not exist', $name));
	}

	/**
	 * @return array
	 */
	public function getPagination()
	{
		return [
			'page_size'     => $this->response->getHeader('X-Page-Size'),
			'total_pages'   => $this->response->getHeader('X-Page-Total'),
			'results'       => $this->response->getHeader('X-Result-Count'),
			'results_total' => $this->response->getHeader('X-Result-Total'),
		];
	}

	/**
	 * @param mixed $response
	 */
	public function setResponse($response)
	{
		$this->response = $response;
	}

	/**
	 * @param $name
	 * @param $arguments
	 *
	 * @return mixed
	 */
	public function __call($name, $arguments)
	{
		return $this->api($name);
	}
}