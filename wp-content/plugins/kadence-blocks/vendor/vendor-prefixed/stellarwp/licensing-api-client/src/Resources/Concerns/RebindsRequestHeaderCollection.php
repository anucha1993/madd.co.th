<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Concerns;

use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Http\RequestHeaderCollection;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsLedgerResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsPoolsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsQuotasResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\Credit\CreditsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\EntitlementsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\LicensesResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\ProductsResource;
use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Resources\TokensResource;

/**
 * Provides immutable request-header rebinding for resource views.
 *
 * @mixin CreditsLedgerResource
 * @mixin CreditsPoolsResource
 * @mixin CreditsQuotasResource
 * @mixin CreditsResource
 * @mixin EntitlementsResource
 * @mixin LicensesResource
 * @mixin ProductsResource
 * @mixin TokensResource
 */
trait RebindsRequestHeaderCollection
{
	public function withRequestHeaderCollection(RequestHeaderCollection $requestHeaderCollection): self {
		if ($this->requestHeaderCollection === $requestHeaderCollection) {
			return $this;
		}

		return $this->rebindWithRequestHeaderCollection($requestHeaderCollection);
	}

	abstract protected function rebindWithRequestHeaderCollection(RequestHeaderCollection $requestHeaderCollection): self;
}
