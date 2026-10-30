<?php

namespace KadenceWP\KadenceBlocks\Composer\Installers;

/**
 * Class DolibarrInstaller
 *
 * @package \KadenceWP\KadenceBlocks\Composer\Installers
 * @author  Raphaël Doursenaud <rdoursenaud@gpcsolutions.fr>
 */
class DolibarrInstaller extends BaseInstaller
{
    //TODO: Add support for scripts and themes
    /** @var array<string, string> */
    protected $locations = array('module' => 'htdocs/custom/{$name}/');
}