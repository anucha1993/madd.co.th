<?php

namespace KadenceWP\KadenceBlocks\LiquidWeb\Harbor\Contracts;

interface Provider_Interface {
	/**
	 * Register action/filter listeners to hook into WordPress
	 *
	 * @return void
	 */
	public function register();
}
