<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts;

use JsonException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\Contracts\ApiErrorExceptionInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\MissingAuthenticationException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Exceptions\UnexpectedResponseException;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Entitlement\SwitchTier;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Requests\Entitlement\Upsert;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Cancel;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Delete;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Suspend;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\SwitchTier as SwitchTierResponse;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Unsuspend;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Entitlement\Upsert as UpsertResponse;
use KadenceWP\KadenceBlocks\Psr\Http\Client\ClientExceptionInterface;

/**
 * Defines the entitlements resource surface.
 */
interface EntitlementsResourceInterface
{
	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function upsert(Upsert $request): UpsertResponse;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function switchTier(SwitchTier $request): SwitchTierResponse;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function suspend(string $licenseKey, string $productSlug, string $tier): Suspend;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function unsuspend(string $licenseKey, string $productSlug, string $tier): Unsuspend;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function cancel(string $licenseKey, string $productSlug, string $tier, ?string $reason = null): Cancel;

	/**
	 * @throws ApiErrorExceptionInterface
	 * @throws MissingAuthenticationException
	 * @throws UnexpectedResponseException
	 * @throws ClientExceptionInterface
	 * @throws JsonException
	 */
	public function delete(string $licenseKey, string $productSlug, string $tier): Delete;
}
