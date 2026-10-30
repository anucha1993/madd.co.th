<?php

/**
 * Dot - PHP dot notation access to arrays
 *
 * @author  Riku Särkinen <riku@adbar.io>
 * @link    https://github.com/adbario/php-dot-notation
 * @license https://github.com/adbario/php-dot-notation/blob/3.x/LICENSE.md (MIT License)
 */

use KadenceWP\KadenceBlocks\Adbar\Dot;

if (! function_exists('kadence_blocks_dot')) {
    /**
     * Create a new Dot object with the given items
     *
     * @param  mixed  $items
     * @param  bool  $parse
     * @param  non-empty-string  $delimiter
     * @return \KadenceWP\KadenceBlocks\Adbar\Dot<array-key, mixed>
     */
    function kadence_blocks_dot($items, $parse = false, $delimiter = ".")
    {
        return new Dot($items, $parse, $delimiter);
    }
}
