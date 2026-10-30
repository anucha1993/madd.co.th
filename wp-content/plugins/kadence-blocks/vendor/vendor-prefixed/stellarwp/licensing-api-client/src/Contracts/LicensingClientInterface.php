<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Contracts;

use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\CreditsResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\EntitlementsResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\LicensesResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\ProductsResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Contracts\TokensResourceInterface;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Tracing\TraceContext;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Tracing\TraceParent;

/**
 * Defines the root entrypoint for the Licensing API client.
 */
interface LicensingClientInterface
{
	public function entitlements(): EntitlementsResourceInterface;

	public function licenses(): LicensesResourceInterface;

	public function products(): ProductsResourceInterface;

	public function credits(): CreditsResourceInterface;

	public function tokens(): TokensResourceInterface;

	public function withoutAuth(): self;

	public function withConfiguredToken(): self;

	public function withToken(string $token): self;

	/**
	 * @param array<string, string|int|float|bool> $headers
	 */
	public function withHeaders(array $headers): self;

	public function withTraceParent(TraceParent $traceParent): self;

	public function withTraceContext(TraceContext $traceContext): self;

	public function withoutHeaders(): self;
}
