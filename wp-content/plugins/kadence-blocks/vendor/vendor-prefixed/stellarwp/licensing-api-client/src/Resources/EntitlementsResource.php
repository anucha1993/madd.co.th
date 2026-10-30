<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources;

use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\Contracts\ApiErrorExceptionInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\AuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\Factories\ApiUriFactory;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestBuilder;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestExecutor;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Entitlement\SwitchTier as SwitchTierRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Entitlement\Upsert as UpsertRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsAuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsRequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\EntitlementsResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Cancel;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Delete;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Suspend;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\SwitchTier as SwitchTierResponse;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Unsuspend;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Upsert as UpsertResponse;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Provides operations for the entitlements API resource.
 *
 * @phpstan-import-type JsonObject from RequestBuilder
 * @phpstan-type EntitlementStatusPayload array{
 *     product_slug: string,
 *     tier: string,
 *     status: string
 * }
 * @phpstan-type UpsertPayload array{
 *     license_key: string,
 *     products: list<array{
 *         product_slug: string,
 *         tier: string,
 *         status: string
 *     }>
 * }
 * @phpstan-type DeletePayload array{
 *     deleted: bool
 * }
 * @phpstan-type SwitchTierPayload array{
 *     product_slug: string,
 *     from_tier: string,
 *     to_tier: string,
 *     status: string,
 *     site_limit: int,
 *     active_count: int,
 *     over_limit: bool
 * }
 */
final class EntitlementsResource implements EntitlementsResourceInterface
{
	use RebindsAuthState;
	use RebindsRequestHeaderCollection;

	private RequestExecutor $requestExecutor;

	private ApiUriFactory $apiUriFactory;

	private AuthState $authState;

	private RequestHeaderCollection $requestHeaderCollection;

	public function __construct(
		RequestExecutor $requestExecutor,
		ApiUriFactory $apiUriFactory,
		AuthState $authState,
		RequestHeaderCollection $requestHeaderCollection
	) {
		$this->requestExecutor         = $requestExecutor;
		$this->apiUriFactory           = $apiUriFactory;
		$this->authState               = $authState;
		$this->requestHeaderCollection = $requestHeaderCollection;
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function upsert(UpsertRequest $request): UpsertResponse {
		/** @var JsonObject $body */
		$body = $request->toArray();

		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/entitlements'),
			[],
			$body,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var UpsertPayload $result */
		return UpsertResponse::from($result);
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function switchTier(SwitchTierRequest $request): SwitchTierResponse {
		/** @var JsonObject $body */
		$body = $request->toArray();

		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/entitlements/switch-tier'),
			[],
			$body,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var SwitchTierPayload $result */
		return SwitchTierResponse::from($result);
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function suspend(string $licenseKey, string $productSlug, string $tier): Suspend {
		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/entitlements/suspend'),
			[],
			[
				'license_key'  => $licenseKey,
				'product_slug' => $productSlug,
				'tier'         => $tier,
			],
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var EntitlementStatusPayload $result */
		return Suspend::from($result);
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function unsuspend(string $licenseKey, string $productSlug, string $tier): Unsuspend {
		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/entitlements/unsuspend'),
			[],
			[
				'license_key'  => $licenseKey,
				'product_slug' => $productSlug,
				'tier'         => $tier,
			],
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var EntitlementStatusPayload $result */
		return Unsuspend::from($result);
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function cancel(string $licenseKey, string $productSlug, string $tier, ?string $reason = null): Cancel {
		$body = array_filter([
			'license_key'  => $licenseKey,
			'product_slug' => $productSlug,
			'tier'         => $tier,
			'reason'       => $reason,
		], static fn ($value): bool => $value !== null);

		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/entitlements/cancel'),
			[],
			$body,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var EntitlementStatusPayload $result */
		return Cancel::from($result);
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function delete(string $licenseKey, string $productSlug, string $tier): Delete {
		$result = $this->requestExecutor->executeJson(
			'DELETE',
			$this->apiUriFactory->make('/entitlements'),
			[],
			[
				'license_key'  => $licenseKey,
				'product_slug' => $productSlug,
				'tier'         => $tier,
			],
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var DeletePayload $result */
		return Delete::from($result);
	}

	protected function rebindWithAuthState(AuthState $authState): self {
		return new self($this->requestExecutor, $this->apiUriFactory, $authState, $this->requestHeaderCollection);
	}

	protected function rebindWithRequestHeaderCollection(RequestHeaderCollection $requestHeaderCollection): self {
		return new self($this->requestExecutor, $this->apiUriFactory, $this->authState, $requestHeaderCollection);
	}
}
