<?php

namespace Adrifkat\Cryptopanic\Http\Request;

use GuzzleHttp\Client;
use Adrifkat\Cryptopanic\ResponseException;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper;
use JsonMapper_Exception;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest
{
	const BASE_URL = 'https://cryptopanic.com/api/v1/';

	/**
	 * @var string
	 */
	protected string $endpoint;

	/**
	 * @var array
	 */
	protected array $params = [];

	/**
	 * @param string $authToken
	 */
	public function __construct(string $authToken)
	{
		$this->addParam('auth_token', $authToken);
	}

	/**
	 * @return mixed|object
	 * @throws ResponseException
	 * @throws GuzzleException
	 * @throws JsonMapper_Exception
	 */
	public function send()
	{
		$mapper = new JsonMapper();
		$mapper->bEnforceMapType = false;

		$response = $this->sendRequest();

		if ($this->successful($response->getStatusCode())) {
			return $mapper->map(json_decode($response->getBody(), true), $this->getResponseInstance());
		}

		$exception = new ResponseException();
		$exception->response = $response;
		throw $exception;
	}

	/**
	 * @return array
	 */
	public function getParams(): array
	{
		return $this->params;
	}

	/**
	 * @param $body
	 */
	public function setParams($body)
	{
		$this->params = $body;
	}

	/**
	 * @param $key
	 * @param $data
	 */
	public function addParam($key, $data)
	{
		$this->params[$key] = $data;
	}

	/**
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	protected function sendRequest(): ResponseInterface
	{
		$client = new Client([
			'base_uri' => $this->getRequestBaseUrl()
		]);

		return $client->request('GET', $this->getRequestUrl(), ['query' => $this->getParams()]);
	}

	/**
	 * @return string
	 */
	protected function getRequestUrl(): string
	{
		$url = $this->getRequestBaseUrl() . $this->getEndpoint();

		if ($this->getParams()) {
			$params = $this->getParams();

			foreach ($params as $key => $param) {
				unset($params[$key]);
				$params['{' . $key . '}'] = $param;
			}

			$url = strtr($url, $params);
		}

		return $url;
	}

	/**
	 * @return string
	 */
	protected function getRequestBaseUrl(): string
	{
		return self::BASE_URL;
	}

	/**
	 * @return string
	 */
	protected function getEndpoint(): string
	{
		return $this->endpoint;
	}

	/**
	 * Determine if the request was successful.
	 *
	 * @return bool
	 */
	private function successful($status): bool
	{
		return $status >= 200 && $status < 300;
	}
}
