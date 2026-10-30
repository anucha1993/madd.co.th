<?php

declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter;

interface ReaderInterface
{
    /**
     * Read an environment variable, if it exists.
     *
     * @param non-empty-string $name
     *
     * @return \KadenceWP\KadenceBlocks\PhpOption\Option<string>
     */
    public function read(string $name);
}
