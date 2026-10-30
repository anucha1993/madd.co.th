<?php

namespace KadenceWP\KadenceBlocks\Composer\Installers;

/**
 *
 * Installer for kanboard plugins
 *
 * kanboard.net
 *
 * Class KanboardInstaller
 * @package \KadenceWP\KadenceBlocks\Composer\Installers
 */
class KanboardInstaller extends BaseInstaller
{
    /** @var array<string, string> */
    protected $locations = array('plugin' => 'plugins/{$name}/');
}