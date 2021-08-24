<?php

namespace Adrifkat\Cryptopanic\Http\Response;

class PostsResponse extends AbstractResponse
{
	/**
	 * @var int
	 */
	public int $count;

	/**
	 * @var string|null
	 */
	public ?string $next;

	/**
	 * @var string|null
	 */
	public ?string $previous;

	/**
	 * @var \Adrifkat\Cryptopanic\Http\Response\Models\NewsModel[]
	 */
	public array $results;
}
