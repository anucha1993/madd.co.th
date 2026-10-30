<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClientWordPress;

use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Api;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\ApiBuilder;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Config;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientInterface;
use KadenceWP\KadenceBlocks\Psr\Http\Message\RequestFactoryInterface;
use KadenceWP\KadenceBlocks\Psr\Http\Message\StreamFactoryInterface;

/**
 * Builds the core licensing API client with WordPress-compatible transport dependencies.
 *
 * @note Use this when you don't have a DI Container to build out the dependency tree.
 */
final class WordPressApiFactory
{
	private ClientInterface $httpClient;

	private RequestFactoryInterface $requestFactory;

	private StreamFactoryInterface $streamFactory;

	public function __construct(
		ClientInterface $httpClient,
		RequestFactoryInterface $requestFactory,
		StreamFactoryInterface $streamFactory
	) {
		$this->httpClient     = $httpClient;
		$this->requestFactory = $requestFactory;
		$this->streamFactory  = $streamFactory;
	}

	public function make(Config $config): Api {
		return (new ApiBuilder(
			$this->httpClient,
			$this->requestFactory,
			$this->streamFactory,
			$config
		))->build();
	}
}
