<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts;

use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\Contracts\ApiErrorExceptionInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Token\Create as CreateRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Token\Revoke as RevokeRequest;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Token\Auth;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Token\TokenList;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Token\ValueObjects\TokenItem;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Defines the tokens resource surface.
 */
interface TokensResourceInterface
{
	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function list(string $licenseKey): TokenList;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function create(CreateRequest $request): TokenItem;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function revoke(RevokeRequest $request): TokenItem;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function auth(string $licenseKey, string $token, string $domain): Auth;
}
