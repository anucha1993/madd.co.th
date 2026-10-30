<?php

declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter;

interface AdapterInterface extends ReaderInterface, WriterInterface
{
    /**
     * Create a new instance of the adapter, if it is available.
     *
     * @return \KadenceWP\KadenceBlocks\PhpOption\Option<\KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter\AdapterInterface>
     */
    public static function create();
}
