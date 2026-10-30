<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Credit;

use KadenceWP\KadenceBlocks\LiquidWeb\LicensingApiClient\Responses\Contracts\Response;

/**
 * Represents a successful quota deletion.
 *
 * @implements Response<array{deleted: bool}>
 */
final class DeleteQuota implements Response
{
	public bool $deleted;

	private function __construct(bool $deleted) {
		$this->deleted = $deleted;
	}

	/**
	 * @param array{deleted: bool} $attributes
	 */
	public static function from(array $attributes): self {
		return new self($attributes['deleted']);
	}

	/**
	 * @return array{deleted: bool}
	 */
	public function toArray(): array {
		return [
			'deleted' => $this->deleted,
		];
	}
}
