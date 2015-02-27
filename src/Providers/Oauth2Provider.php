<?php

namespace GuildWars2\Providers;

use League\OAuth2\Client\Entity\User;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;

class Oauth2Provider extends AbstractProvider
{
	/**
	 * Get the URL that this provider uses to begin authorization.
	 *
	 * @return string
	 */
	public function urlAuthorize()
	{
		return 'https://account.guildwars2.com/oauth2/authorization';
	}

	/**
	 * Get the URL that this provider users to request an access token.
	 *
	 * @return string
	 */
	public function urlAccessToken()
	{
		return 'https://account.guildwars2.com/oauth2/token';
	}

	/**
	 * Get the URL that this provider uses to request user details.
	 * Since this URL is typically an authorized route, most providers will require you to pass the access_token as
	 * a parameter to the request. For example, the google url is:
	 * 'https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token='.$token
	 *
	 * @param AccessToken $token
	 *
	 * @return string
	 */
	public function urlUserDetails(AccessToken $token)
	{
		return 'https://api.guildwars2.com/v2/account?access_token='.$token;
	}

	/**
	 * Given an object response from the server, process the user details into a format expected by the user
	 * of the client.
	 *
	 * @param object      $response
	 * @param AccessToken $token
	 *
	 * @return mixed
	 */
	public function userDetails($response, AccessToken $token)
	{
		$user = new User();
		$user->exchangeArray([
			'uid'      => $response->id,
			'nickname' => $response->name,
			'location' => $response->world,
		]);

		return $user;
	}
}