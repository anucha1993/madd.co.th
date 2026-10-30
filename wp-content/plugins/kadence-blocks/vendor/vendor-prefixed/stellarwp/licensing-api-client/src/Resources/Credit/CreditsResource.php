<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit;

use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\ApiResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\AuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\Factories\ApiUriFactory;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestExecutor;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\RecordUsage as RecordUsageRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\Refund as RefundRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsAuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsRequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsLedgerResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsPoolsResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsQuotasResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\BalanceCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\RecordUsage;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\Refund;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Provides operations for the credits API resource.
 *
 * @phpstan-type BalancePayload array{
 *     credits: list<array{
 *         credit_type: string,
 *         remaining: int,
 *         site_quota: int|null,
 *         site_used: int,
 *         site_remaining: int,
 *         aggregate_total: int,
 *         aggregate_used: int,
 *         aggregate_remaining: int,
 *         aggregate_overage: int,
 *         pools: list<array{
 *             pool_id: int,
 *             pool_remaining: int,
 *             priority: int,
 *             period: string,
 *             resets_on: string|null,
 *             expires_at: string|null,
 *             credits_total?: int,
 *             credits_used?: int,
 *             overage?: int,
 *             overage_limit?: int|null
 *         }>
 *     }>
 * }
 * @phpstan-import-type RecordUsagePayload from RecordUsageRequest
 * @phpstan-import-type RefundPayload from RefundRequest
 * @phpstan-type RecordUsageResponsePayload array{
 *     credits_used: int,
 *     pool_remaining: int,
 *     site_remaining: int|null,
 *     pool_breakdown: array<array-key, int>
 * }
 * @phpstan-type RefundResponsePayload array{
 *     credits_refunded: int,
 *     pool_remaining: int,
 *     site_remaining: int|null,
 *     pool_breakdown: array<array-key, int>
 * }
 */
final class CreditsResource implements CreditsResourceInterface
{
	use RebindsAuthState;
	use RebindsRequestHeaderCollection;

	private RequestExecutor $requestExecutor;

	private ApiUriFactory $apiUriFactory;

	private AuthState $authState;

	private RequestHeaderCollection $requestHeaderCollection;

	private CreditsPoolsResource $pools;

	private CreditsQuotasResource $quotas;

	private CreditsLedgerResource $ledger;

	public function __construct(
		RequestExecutor $requestExecutor,
		ApiUriFactory $apiUriFactory,
		AuthState $authState,
		RequestHeaderCollection $requestHeaderCollection,
		CreditsPoolsResource $pools,
		CreditsQuotasResource $quotas,
		CreditsLedgerResource $ledger
	) {
		$this->requestExecutor         = $requestExecutor;
		$this->apiUriFactory           = $apiUriFactory;
		$this->authState               = $authState;
		$this->requestHeaderCollection = $requestHeaderCollection;
		$this->pools                   = $pools;
		$this->quotas                  = $quotas;
		$this->ledger                  = $ledger;
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function balance(string $licenseKey, string $domain, ?string $creditType = null, ?string $sort = null): BalanceCollection {
		$result = $this->requestExecutor->executeJson(
			'GET',
			$this->apiUriFactory->make('/credits'),
			array_filter([
				'license_key' => $licenseKey,
				'domain'      => $domain,
				'credit_type' => $creditType,
				'sort'        => $sort,
			], static fn ($value): bool => $value !== null),
			null,
			$this->authState->optionalToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var BalancePayload $result */
		return BalanceCollection::from($result);
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function recordUsage(RecordUsageRequest $request): RecordUsage {
		/** @var RecordUsagePayload $body */
		$body = $request->toArray();

		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/credits/usage'),
			[],
			$body,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->merge([
				'X-Idempotency-Key' => $request->idempotencyKey,
			])
		);

		/** @var RecordUsageResponsePayload $result */
		return RecordUsage::from($result);
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function refund(RefundRequest $request): Refund {
		/** @var RefundPayload $body */
		$body = $request->toArray();

		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/credits/refunds'),
			[],
			$body,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->merge([
				'X-Idempotency-Key' => $request->idempotencyKey,
			])
		);

		/** @var RefundResponsePayload $result */
		return Refund::from($result);
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function pools(): CreditsPoolsResourceInterface {
		return $this->pools;
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function quotas(): CreditsQuotasResourceInterface {
		return $this->quotas;
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function ledger(): CreditsLedgerResourceInterface {
		return $this->ledger;
	}

	protected function rebindWithAuthState(AuthState $authState): self {
		return new self(
			$this->requestExecutor,
			$this->apiUriFactory,
			$authState,
			$this->requestHeaderCollection,
			$this->pools->withAuthState($authState),
			$this->quotas->withAuthState($authState),
			$this->ledger->withAuthState($authState)
		);
	}

	protected function rebindWithRequestHeaderCollection(RequestHeaderCollection $requestHeaderCollection): self {
		return new self(
			$this->requestExecutor,
			$this->apiUriFactory,
			$this->authState,
			$requestHeaderCollection,
			$this->pools->withRequestHeaderCollection($requestHeaderCollection),
			$this->quotas->withRequestHeaderCollection($requestHeaderCollection),
			$this->ledger->withRequestHeaderCollection($requestHeaderCollection)
		);
	}
}
