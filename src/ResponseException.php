<?php

namespace Adrifkat\Cryptopanic;

use Exception;
use Psr\Http\Message\ResponseInterface;

class ResponseException extends Exception
{
	/**
	 * @var ResponseInterface
	 */
	public ResponseInterface $response;
}
