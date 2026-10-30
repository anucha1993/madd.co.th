<?php

/**
 * The API implemented by all subscribers.
 *
 * @package KadenceWP\KadenceBlocks\StellarWP\Telemetry\Contracts
 */
namespace KadenceWP\KadenceBlocks\StellarWP\Telemetry\Contracts;

/**
 * Interface Subscriber_Interface
 *
 * @package \KadenceWP\KadenceBlocks\StellarWP\Telemetry\Contracts
 */
interface Subscriber_Interface
{
    /**
     * Register action/filter listeners to hook into WordPress
     *
     * @return void
     */
    public function register();
}