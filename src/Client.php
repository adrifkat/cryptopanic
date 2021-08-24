<?php

namespace Adrifkat\Cryptopanic;

use Adrifkat\Cryptopanic\Http\Request\PortfolioRequest;
use Adrifkat\Cryptopanic\Http\Request\PostsRequest;

class Client
{
	/**
	 * @var string
	 */
	private string $authToken;

	/**
	 * @param string $authToken
	 */
	public function __construct(string $authToken)
	{
		$this->authToken = $authToken;
	}

	/**
	 * @return PostsRequest
	 */
	public function getPostsRequest(): PostsRequest
	{
		return new PostsRequest($this->authToken);
	}

	/**
	 * @return PortfolioRequest
	 */
	public function getPortfolioRequest(): PortfolioRequest
	{
		return new PortfolioRequest($this->authToken);
	}
}
