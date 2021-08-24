# PHP unofficial client to CryptoPanic.com API

[CryptoPanic.com](https://cryptopanic.com) is a news aggregator platform indicating impact on price and market for traders and cryptocurrency enthusiasts. Users can vote to mark important, bullish or bearish price signals.

## Install

	composer require adrifkat/cryptopanic

## Usage

> Get your <AUTH_TOKEN> from the [cryptopanic API page](https://cryptopanic.com/about/api/).

```php

$client = new \Adrifkat\Cryptopanic\Client('<AUTH_TOKEN>');
$postsResponse = $client->getPostsRequest()
	->setCurrencies(['BTC', 'XRP'])
	->setFilter('bearish')
	->send();
	
$portfolioResponse = $client->send();	

```

### Posts Request Methods

- `setFilter(string $value)`: You can use any of UI filters using filter. Available values: rising|hot|bullish|bearish|important|saved|lol
- `setCurrencies(array $currencies)`: Filter by currencies. Example: ['CURRENCY_CODE1', 'CURRENCY_CODE2']
- `setRegions(array $regions)`: Filter by region. Available regions: en (English), de (Deutsch), nl (Dutch), es (Español), fr (Français), it (Italiano), pt (Português), ru (Русский). Example: ['en', 'nl']
- `setKind(string $value)`: Filter by kind. Available values: news|media
- `setFollowing(bool $following)`: Filter only "Following" feed - based on currencies you follow
- `setPublic(bool $public))`: Enable public API

# License

MIT
