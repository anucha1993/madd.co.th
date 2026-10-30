<?php

namespace KadenceWP\KadenceBlocks\Composer\Installers;

class AttogramInstaller extends BaseInstaller
{
    /** @var array<string, string> */
    protected $locations = array(
        'module' => 'modules/{$name}/',
    );
}
