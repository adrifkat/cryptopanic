<?php

namespace Adrifkat\Cryptopanic\Http\Response\Models;

class NewsModel
{
	/**
	 * @var string
	 */
	public string $kind;

	/**
	 * @var string
	 */
	public string $domain;

	/**
	 * @var SourceModel
	 */
	public SourceModel $source;

	/**
	 * @var string
	 */
	public string $title;

	/**
	 * @var ?\DateTime
	 */
	public ?\DateTime $publishedAt = null;

	/**
	 * @var string
	 */
	public string $slug;

	/**
	 * @var CurrencyModel[]
	 */
	public array $currencies;

	/**
	 * @var int
	 */
	public int $id;

	/**
	 * @var string
	 */
	public string $url;

	/**
	 * @var \DateTime
	 */
	public \DateTime $createdAt;
}
