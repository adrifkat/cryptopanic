<?php

namespace Adrifkat\Cryptopanic\Http\Request;

use Adrifkat\Cryptopanic\Http\Response\PortfolioResponse;

class PortfolioRequest extends AbstractRequest
{
	/**
	 * @var string
	 */
	protected string $endpoint = 'portfolio/';

	/**
	 * @return PortfolioResponse
	 */
	public function getResponseInstance(): PortfolioResponse
	{
		return new PortfolioResponse();
	}
}
