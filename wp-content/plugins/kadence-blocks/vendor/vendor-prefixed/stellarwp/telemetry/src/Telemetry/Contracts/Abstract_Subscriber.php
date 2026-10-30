<?php

/**
 * Handles setting up a base for all subscribers.
 *
 * @package KadenceWP\KadenceBlocks\StellarWP\Telemetry\Contracts
 */
namespace KadenceWP\KadenceBlocks\StellarWP\Telemetry\Contracts;

use KadenceWP\KadenceBlocks\StellarWP\ContainerContract\ContainerInterface;
/**
 * Class Abstract_Subscriber
 *
 * @package \KadenceWP\KadenceBlocks\StellarWP\Telemetry\Contracts
 */
abstract class Abstract_Subscriber implements Subscriber_Interface
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * Constructor for the class.
     *
     * @param ContainerInterface $container The container.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}