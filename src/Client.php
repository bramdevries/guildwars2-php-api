<?php

namespace GuildWars2;

use GuzzleHttp\Client as AbstractClient;

/**
 * Class Client
 *
 * @method Requests\Build build()
 * @method Requests\Colors colors()
 * @method Requests\Commerce commerce()
 * @method Requests\Worlds worlds()
 * @method Requests\Quaggans quaggans()
 * @method Requests\Items items()
 * @method Requests\Recipes recipes()
 * @method Requests\Skins skins()
 *
 * @author  Bram Devries <bram@madewithlove.be>
 * @package GuildWars2
 */
class Client extends AbstractClient
{
	/**
	 * @var array
	 */
	protected $config = [
		'base_url' => 'https://api.guildwars2.com/v2/'
	];

	/**
	 * @param array $config
	 */
	public function __construct(array $config = [])
	{
		parent::__construct(array_merge_recursive($config, $this->config));
	}

	/**
	 * @param $name
	 */
	public function api($name)
	{
		$className = 'GuildWars2\Requests\\' . ucfirst($name);

		if (class_exists($className)) {
			return new $className($this);
		}

		throw new \InvalidArgumentException(sprintf('%s does not exist', $name));
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