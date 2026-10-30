<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit;

use Generator;
use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\Contracts\ApiErrorExceptionInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\AuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\Factories\ApiUriFactory;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestExecutor;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\ListLedgerEntries;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsAuthState;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns\RebindsRequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsLedgerResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\LedgerPage;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Provides operations for the credits ledger API resource.
 *
 * @phpstan-import-type ListLedgerEntriesQuery from ListLedgerEntries
 * @phpstan-type LedgerEntryPayload array{
 *     id: int,
 *     pool_id: int,
 *     entitlement_id_at_event: int,
 *     tier_at_event: string,
 *     domain: string,
 *     product_slug: string,
 *     credit_type: string,
 *     entry_type: string,
 *     amount: int,
 *     period_start: string|null,
 *     idempotency_key: string,
 *     created_at: string
 * }
 * @phpstan-type LedgerPagePayload array{
 *     entries: list<LedgerEntryPayload>,
 *     links: array{
 *         first: string,
 *         last: string|null,
 *         prev: string|null,
 *         next: string|null
 *     },
 *     meta: array{
 *         page: array{
 *             total: int,
 *             limit: int,
 *             max_size: int
 *         }
 *     }
 * }
 */
final class CreditsLedgerResource implements CreditsLedgerResourceInterface
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
	public function list(ListLedgerEntries $request): LedgerPage {
		/** @var ListLedgerEntriesQuery $query */
		$query = $request->toQuery();

		$result = $this->requestExecutor->executeJson(
			'GET',
			$this->apiUriFactory->make('/credits/ledger'),
			$query,
			null,
			$this->authState->requiredToken(),
			$this->requestHeaderCollection->all()
		);

		/** @var LedgerPagePayload $result */
		return LedgerPage::from($result);
	}

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 *
	 * @return Generator<int, LedgerPage, mixed, void>
	 */
	public function pages(ListLedgerEntries $request): Generator {
		$page = $this->list($request);

		while (true) {
			yield $page;

			if ($page->links->next === null) {
				return;
			}

			$result = $this->requestExecutor->executeJson(
				'GET',
				$this->apiUriFactory->fromPaginationLink($page->links->next),
				[],
				null,
				$this->authState->requiredToken(),
				$this->requestHeaderCollection->all()
			);

			/** @var LedgerPagePayload $result */
			$page = LedgerPage::from($result);
		}
	}

	protected function rebindWithAuthState(AuthState $authState): self {
		return new self($this->requestExecutor, $this->apiUriFactory, $authState, $this->requestHeaderCollection);
	}

	protected function rebindWithRequestHeaderCollection(RequestHeaderCollection $requestHeaderCollection): self {
		return new self($this->requestExecutor, $this->apiUriFactory, $this->authState, $requestHeaderCollection);
	}
}
