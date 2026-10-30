<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts;

use Generator;
use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\Contracts\ApiErrorExceptionInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\ListLedgerEntries;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\LedgerPage;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Defines the credits ledger resource surface.
 */
interface CreditsLedgerResourceInterface
{
	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function list(ListLedgerEntries $request): LedgerPage;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 *
	 * @return Generator<int, LedgerPage, mixed, void>
	 */
	public function pages(ListLedgerEntries $request): Generator;
}
