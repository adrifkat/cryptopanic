<?php

namespace Adrifkat\Cryptopanic\Http\Request;

use Adrifkat\Cryptopanic\Http\Response\PostsResponse;

class PostsRequest extends AbstractRequest
{
	/**
	 * @var string
	 */
	protected string $endpoint = 'posts/';

	/**
	 * @return PostsResponse
	 */
	public function getResponseInstance(): PostsResponse
	{
		return new PostsResponse();
	}

	/**
	 * You can use any of UI filters using filter
	 * Available values: rising|hot|bullish|bearish|important|saved|lol
	 *
	 * @param string $value
	 * @return $this
	 */
	public function setFilter(string $value): PostsRequest
	{
		$this->addParam('filter', $value);

		return $this;
	}

	/**
	 * Filter by currencies
	 * Example: ['CURRENCY_CODE1', 'CURRENCY_CODE2']
	 *
	 * @param array $currencies
	 * @return $this
	 */
	public function setCurrencies(array $currencies): PostsRequest
	{
		$this->addParam('currencies', implode(',', $currencies));

		return $this;
	}

	/**
	 * Filter by region
	 * Available regions: en (English), de (Deutsch), nl (Dutch), es (Español), fr (Français), it (Italiano), pt (Português), ru (Русский)
	 * Example: ['en', 'nl']
	 * Default: en
	 *
	 * @param array $regions
	 * @return $this
	 */
	public function setRegions(array $regions): PostsRequest
	{
		$this->addParam('regions', implode(',', $regions));

		return $this;
	}

	/**
	 * Filter by kind
	 * Available values: news|media
	 * Default: all
	 *
	 * @param string $value
	 * @return $this
	 */
	public function setKind(string $value): PostsRequest
	{
		$this->addParam('kind', $value);

		return $this;
	}

	/**
	 * Filter only "Following" feed - based on currencies you follow
	 *
	 * @param bool $following
	 * @return $this
	 */
	public function setFollowing(bool $following): PostsRequest
	{
		$this->addParam('following', $following);

		return $this;
	}

	/**
	 * Enable public API
	 *
	 * @param bool $public
	 * @return $this
	 */
	public function setPublic(bool $public): PostsRequest
	{
		$this->addParam('public', $public);

		return $this;
	}
}
