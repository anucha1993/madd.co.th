<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient;

use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\ApiVersion;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\AuthContext;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\AuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\Factories\ApiUriFactory;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\Factories\ResponseExceptionFactory;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\JsonDecoder;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestBuilder;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestExecutor;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsLedgerResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsPoolsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsQuotasResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\EntitlementsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\LicensesResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\ProductsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\TokensResource;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientInterface as HttpClient;
use KadenceWP\KadenceBlocks\Psr\Http\Message\RequestFactoryInterface;
use KadenceWP\KadenceBlocks\Psr\Http\Message\StreamFactoryInterface;

/**
 * Builds a fully-wired API client from the transport dependencies.
 *
 * Use this if your application is not using a container to build dependencies.
 */
final class ApiBuilder
{
	private HttpClient $httpClient;

	private RequestFactoryInterface $requestFactory;

	private StreamFactoryInterface $streamFactory;

	private Config $config;

	public function __construct(
		HttpClient $httpClient,
		RequestFactoryInterface $requestFactory,
		StreamFactoryInterface $streamFactory,
		Config $config
	) {
		$this->httpClient     = $httpClient;
		$this->requestFactory = $requestFactory;
		$this->streamFactory  = $streamFactory;
		$this->config         = $config;
	}

	public function build(): Api {
		$authState               = new AuthState(new AuthContext(), $this->config->configuredToken);
		$requestHeaderCollection = new RequestHeaderCollection();
		$apiUriFactory           = new ApiUriFactory($this->config, ApiVersion::default());
		$requestExecutor         = $this->buildRequestExecutor();
		$creditsPools            = new CreditsPoolsResource($requestExecutor, $apiUriFactory, $authState, $requestHeaderCollection);
		$creditsQuotas           = new CreditsQuotasResource($requestExecutor, $apiUriFactory, $authState, $requestHeaderCollection);
		$creditsLedger           = new CreditsLedgerResource(
			$requestExecutor,
			$apiUriFactory,
			$authState,
			$requestHeaderCollection
		);

		return new Api(
			$authState,
			$requestHeaderCollection,
			new LicensesResource($requestExecutor, $apiUriFactory, $authState, $requestHeaderCollection),
			new ProductsResource($requestExecutor, $apiUriFactory, $authState, $requestHeaderCollection),
			new CreditsResource(
				$requestExecutor,
				$apiUriFactory,
				$authState,
				$requestHeaderCollection,
				$creditsPools,
				$creditsQuotas,
				$creditsLedger
			),
			new EntitlementsResource($requestExecutor, $apiUriFactory, $authState, $requestHeaderCollection),
			new TokensResource($requestExecutor, $apiUriFactory, $authState, $requestHeaderCollection)
		);
	}

	private function buildRequestExecutor(): RequestExecutor {
		$jsonDecoder = new JsonDecoder();

		return new RequestExecutor(
			$this->httpClient,
			new RequestBuilder(
				$this->requestFactory,
				$this->streamFactory
			),
			$jsonDecoder,
			new ResponseExceptionFactory($jsonDecoder)
		);
	}
}
