<?php declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\StellarWP\ProphecyMonorepo\ImageDownloader\Sanitization\Contracts;

interface Sanitizer
{
	/**
	 * Sanitize a file name.
	 */
	public function __invoke(string $filename): string;
}
