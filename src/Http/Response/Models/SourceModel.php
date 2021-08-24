<?php

namespace Adrifkat\Cryptopanic\Http\Response\Models;

class SourceModel
{
	/**
	 * @var string
	 */
	public string $title;

	/**
	 * @var string
	 */
	public string $region;

	/**
	 * @var string
	 */
	public string $domain;

	/**
	 * @var string|null
	 */
	public ?string $path;
}
