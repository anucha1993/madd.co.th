<?php

/**
 * An exception used to signal no binding was found for container ID.
 *
 * @package lucatume\DI52
 */
namespace KadenceWP\KadenceBlocks\lucatume\DI52;

use KadenceWP\KadenceBlocks\Psr\Container\NotFoundExceptionInterface;
/**
 * Class NotFoundException
 *
 * @package \lucatume\DI52
 */
class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
}