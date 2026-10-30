<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts;

use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\Contracts\ApiErrorExceptionInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\CreatePool;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\DeletePool as DeletePoolRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Credit\UpdatePool;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\DeletePool;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\PoolCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit\ValueObjects\CreditPool;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Defines the credits pools resource surface.
 */
interface CreditsPoolsResourceInterface
{
	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function list(string $licenseKey, bool $active = false): PoolCollection;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function create(CreatePool $request): CreditPool;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function update(UpdatePool $request): CreditPool;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function delete(DeletePoolRequest $request): DeletePool;
}
