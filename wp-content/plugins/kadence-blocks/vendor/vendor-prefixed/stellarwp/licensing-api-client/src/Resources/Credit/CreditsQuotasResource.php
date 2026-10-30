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
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\SetQuota;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsAuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsRequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsQuotasResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\DeleteQuota;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\QuotaCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\ValueObjects\SiteQuota;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Provides operations for the credits quotas API resource.
 *
 * @phpstan-import-type SetQuotaPayload from \LiquidWeb\LicensingApiClient\Requests\Credit\SetQuota
 * @phpstan-type SiteQuotaPayload array{
 *     domain: string,
 *     credit_type: string,
 *     quota: ?int,
 *     period: string,
 *     first_period_start: ?string,
 *     is_blocked: bool,
 *     is_uncapped: bool
 * }
 * @phpstan-type QuotaCollectionPayload array{
 *     quotas: list<SiteQuotaPayload>
 * }
 * @phpstan-type DeleteQuotaPayload array{
 *     deleted: bool
 * }
 */
final class CreditsQuotasResource implements CreditsQuotasResourceInterface
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
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function list(string $licenseKey): QuotaCollection {
		$result = $this->requestExecutor->executeJson(
			'GET',
			$this->apiUriFactory->make('/credits/quotas'),
			[
				'license_key' => $licenseKey,
			],
			null,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var QuotaCollectionPayload $result */
		return QuotaCollection::from($result);
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function set(SetQuota $request): SiteQuota {
		/** @var SetQuotaPayload $body */
		$body = $request->toArray();

		$result = $this->requestExecutor->executeJson(
			'POST',
			$this->apiUriFactory->make('/credits/quotas'),
			[],
			$body,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var SiteQuotaPayload $result */
		return SiteQuota::from($result);
	}

	/**
	 * @throws ApiResponseException
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function delete(string $licenseKey, string $domain, string $creditType): DeleteQuota {
		$result = $this->requestExecutor->executeJson(
			'DELETE',
			$this->apiUriFactory->make('/credits/quotas'),
			[],
			[
				'license_key' => $licenseKey,
				'domain'      => $domain,
				'credit_type' => $creditType,
			],
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var DeleteQuotaPayload $result */
		return DeleteQuota::from($result);
	}

	protected function rebindWithAuthState(AuthState $authState): self {
		return new self($this->requestExecutor, $this->apiUriFactory, $authState, $this->requestHeaderCollection);
	}

	protected function rebindWithRequestHeaderCollection(RequestHeaderCollection $requestHeaderCollection): self {
		return new self($this->requestExecutor, $this->apiUriFactory, $this->authState, $requestHeaderCollection);
	}
}
