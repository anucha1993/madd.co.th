<?php

// Functions and constants

namespace {
    if(!function_exists('\\dot')){
        function dot(...$args) {
            return \kadence_blocks_dot(...func_get_args());
        }
    }
    if(!function_exists('\\trigger_deprecation')){
        function trigger_deprecation(...$args) {
            return \kadence_blocks_trigger_deprecation(...func_get_args());
        }
    }

}
namespace StellarWP\Uplink {
    if(!function_exists('\\StellarWP\\Uplink\\get_container')){
        function get_container(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_container(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\render_authorize_button')){
        function render_authorize_button(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\render_authorize_button(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_authorization_token')){
        function get_authorization_token(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_authorization_token(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\is_authorized')){
        function is_authorized(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\is_authorized(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\is_authorized_by_resource')){
        function is_authorized_by_resource(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\is_authorized_by_resource(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\is_user_authorized')){
        function is_user_authorized(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\is_user_authorized(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\build_auth_url')){
        function build_auth_url(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\build_auth_url(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_resource')){
        function get_resource(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_resource(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\allows_multisite_license')){
        function allows_multisite_license(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\allows_multisite_license(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\validate_license')){
        function validate_license(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\validate_license(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_license_key')){
        function get_license_key(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_license_key(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\set_license_key')){
        function set_license_key(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\set_license_key(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_original_domain')){
        function get_original_domain(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_original_domain(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_license_domain')){
        function get_license_domain(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_license_domain(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_disconnect_url')){
        function get_disconnect_url(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_disconnect_url(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_license_field')){
        function get_license_field(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_license_field(...func_get_args());
        }
    }
    if(!function_exists('\\StellarWP\\Uplink\\get_auth_url')){
        function get_auth_url(...$args) {
            return \KadenceWP\KadenceBlocks\StellarWP\Uplink\get_auth_url(...func_get_args());
        }
    }
}
namespace Symfony\Component\String {
    if(!function_exists('\\Symfony\\Component\\String\\u')){
        function u(...$args) {
            return \KadenceWP\KadenceBlocks\Symfony\Component\String\u(...func_get_args());
        }
    }
    if(!function_exists('\\Symfony\\Component\\String\\b')){
        function b(...$args) {
            return \KadenceWP\KadenceBlocks\Symfony\Component\String\b(...func_get_args());
        }
    }
    if(!function_exists('\\Symfony\\Component\\String\\s')){
        function s(...$args) {
            return \KadenceWP\KadenceBlocks\Symfony\Component\String\s(...func_get_args());
        }
    }
}


namespace KadenceWP\KadenceBlocks {

    use BrianHenryIE\Strauss\Types\AutoloadAliasInterface;

    /**
     * @see AutoloadAliasInterface
     *
     * @phpstan-type ClassAliasArray array{'type':'class',isabstract:bool,classname:string,namespace?:string,extends:string,implements:array<string>}
     * @phpstan-type InterfaceAliasArray array{'type':'interface',interfacename:string,namespace?:string,extends:array<string>}
     * @phpstan-type TraitAliasArray array{'type':'trait',traitname:string,namespace?:string,use:array<string>}
     * @phpstan-type AutoloadAliasArray array<string,ClassAliasArray|InterfaceAliasArray|TraitAliasArray>
     */
    class AliasAutoloader
    {
        private string $includeFilePath;

        /**
         * @var AutoloadAliasArray
         */
        private array $autoloadAliases = array (
  'Adbar\\Dot' => 
  array (
    'type' => 'class',
    'classname' => 'Dot',
    'isabstract' => false,
    'namespace' => 'Adbar',
    'extends' => 'KadenceWP\\KadenceBlocks\\Adbar\\Dot',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'IteratorAggregate',
      3 => 'JsonSerializable',
    ),
  ),
  'Composer\\Installers\\AglInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'AglInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\AglInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\AkauntingInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'AkauntingInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\AkauntingInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\AnnotateCmsInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'AnnotateCmsInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\AnnotateCmsInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\AsgardInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'AsgardInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\AsgardInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\AttogramInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'AttogramInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\AttogramInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\BaseInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'BaseInstaller',
    'isabstract' => true,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\BaseInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\BitrixInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'BitrixInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\BitrixInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\BonefishInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'BonefishInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\BonefishInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\BotbleInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'BotbleInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\BotbleInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\CakePHPInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'CakePHPInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\CakePHPInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ChefInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ChefInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ChefInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\CiviCrmInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'CiviCrmInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\CiviCrmInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ClanCatsFrameworkInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ClanCatsFrameworkInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ClanCatsFrameworkInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\CockpitInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'CockpitInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\CockpitInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\CodeIgniterInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'CodeIgniterInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\CodeIgniterInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\Concrete5Installer' => 
  array (
    'type' => 'class',
    'classname' => 'Concrete5Installer',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\Concrete5Installer',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ConcreteCMSInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ConcreteCMSInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ConcreteCMSInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\CroogoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'CroogoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\CroogoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\DecibelInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'DecibelInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\DecibelInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\DframeInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'DframeInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\DframeInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\DokuWikiInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'DokuWikiInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\DokuWikiInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\DolibarrInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'DolibarrInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\DolibarrInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\DrupalInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'DrupalInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\DrupalInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ElggInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ElggInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ElggInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\EliasisInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'EliasisInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\EliasisInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ExpressionEngineInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ExpressionEngineInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ExpressionEngineInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\EzPlatformInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'EzPlatformInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\EzPlatformInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ForkCMSInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ForkCMSInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ForkCMSInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\FuelInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'FuelInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\FuelInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\FuelphpInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'FuelphpInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\FuelphpInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\GravInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'GravInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\GravInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\HuradInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'HuradInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\HuradInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ImageCMSInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ImageCMSInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ImageCMSInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\Installer' => 
  array (
    'type' => 'class',
    'classname' => 'Installer',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\Installer',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ItopInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ItopInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ItopInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\KanboardInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'KanboardInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\KanboardInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\KnownInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'KnownInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\KnownInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\KodiCMSInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'KodiCMSInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\KodiCMSInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\KohanaInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'KohanaInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\KohanaInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\LanManagementSystemInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'LanManagementSystemInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\LanManagementSystemInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\LaravelInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'LaravelInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\LaravelInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\LavaLiteInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'LavaLiteInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\LavaLiteInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\LithiumInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'LithiumInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\LithiumInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MODULEWorkInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MODULEWorkInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MODULEWorkInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MODXEvoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MODXEvoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MODXEvoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MagentoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MagentoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MagentoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MajimaInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MajimaInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MajimaInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MakoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MakoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MakoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MantisBTInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MantisBTInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MantisBTInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MatomoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MatomoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MatomoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MauticInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MauticInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MauticInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MayaInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MayaInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MayaInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MediaWikiInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MediaWikiInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MediaWikiInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MiaoxingInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MiaoxingInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MiaoxingInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MicroweberInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MicroweberInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MicroweberInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ModxInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ModxInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ModxInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\MoodleInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'MoodleInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\MoodleInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\OctoberInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'OctoberInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\OctoberInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\OntoWikiInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'OntoWikiInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\OntoWikiInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\OsclassInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'OsclassInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\OsclassInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\OxidInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'OxidInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\OxidInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PPIInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PPIInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PPIInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PantheonInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PantheonInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PantheonInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PhiftyInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PhiftyInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PhiftyInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PhpBBInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PhpBBInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PhpBBInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PiwikInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PiwikInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PiwikInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PlentymarketsInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PlentymarketsInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PlentymarketsInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\Plugin' => 
  array (
    'type' => 'class',
    'classname' => 'Plugin',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\Plugin',
    'implements' => 
    array (
      0 => 'Composer\\Plugin\\PluginInterface',
    ),
  ),
  'Composer\\Installers\\PortoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PortoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PortoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PrestashopInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PrestashopInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PrestashopInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ProcessWireInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessWireInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ProcessWireInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PuppetInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PuppetInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PuppetInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\PxcmsInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'PxcmsInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\PxcmsInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\RadPHPInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'RadPHPInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\RadPHPInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ReIndexInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ReIndexInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ReIndexInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\Redaxo5Installer' => 
  array (
    'type' => 'class',
    'classname' => 'Redaxo5Installer',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\Redaxo5Installer',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\RedaxoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'RedaxoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\RedaxoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\RoundcubeInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'RoundcubeInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\RoundcubeInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\SMFInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'SMFInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\SMFInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ShopwareInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ShopwareInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ShopwareInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\SilverStripeInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'SilverStripeInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\SilverStripeInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\SiteDirectInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'SiteDirectInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\SiteDirectInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\StarbugInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'StarbugInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\StarbugInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\SyDESInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'SyDESInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\SyDESInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\SyliusInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'SyliusInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\SyliusInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\TaoInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'TaoInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\TaoInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\TastyIgniterInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'TastyIgniterInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\TastyIgniterInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\TheliaInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'TheliaInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\TheliaInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\TuskInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'TuskInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\TuskInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\UserFrostingInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'UserFrostingInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\UserFrostingInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\VanillaInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'VanillaInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\VanillaInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\VgmcpInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'VgmcpInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\VgmcpInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\WHMCSInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'WHMCSInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\WHMCSInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\WinterInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'WinterInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\WinterInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\WolfCMSInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'WolfCMSInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\WolfCMSInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\WordPressInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'WordPressInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\WordPressInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\YawikInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'YawikInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\YawikInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ZendInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ZendInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ZendInstaller',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Installers\\ZikulaInstaller' => 
  array (
    'type' => 'class',
    'classname' => 'ZikulaInstaller',
    'isabstract' => false,
    'namespace' => 'Composer\\Installers',
    'extends' => 'KadenceWP\\KadenceBlocks\\Composer\\Installers\\ZikulaInstaller',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\ElementReference\\Resolver' => 
  array (
    'type' => 'class',
    'classname' => 'Resolver',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\ElementReference',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\ElementReference\\Resolver',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\ElementReference\\Subject' => 
  array (
    'type' => 'class',
    'classname' => 'Subject',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\ElementReference',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\ElementReference\\Subject',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\ElementReference\\Usage' => 
  array (
    'type' => 'class',
    'classname' => 'Usage',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\ElementReference',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\ElementReference\\Usage',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\Exceptions\\NestingException' => 
  array (
    'type' => 'class',
    'classname' => 'NestingException',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\Exceptions\\NestingException',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\Helper' => 
  array (
    'type' => 'class',
    'classname' => 'Helper',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\Helper',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\Sanitizer' => 
  array (
    'type' => 'class',
    'classname' => 'Sanitizer',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\Sanitizer',
    'implements' => 
    array (
    ),
  ),
  'enshrined\\svgSanitize\\data\\AllowedAttributes' => 
  array (
    'type' => 'class',
    'classname' => 'AllowedAttributes',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\data',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\data\\AllowedAttributes',
    'implements' => 
    array (
      0 => 'enshrined\\svgSanitize\\data\\AttributeInterface',
    ),
  ),
  'enshrined\\svgSanitize\\data\\AllowedTags' => 
  array (
    'type' => 'class',
    'classname' => 'AllowedTags',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\data',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\data\\AllowedTags',
    'implements' => 
    array (
      0 => 'enshrined\\svgSanitize\\data\\TagInterface',
    ),
  ),
  'enshrined\\svgSanitize\\data\\XPath' => 
  array (
    'type' => 'class',
    'classname' => 'XPath',
    'isabstract' => false,
    'namespace' => 'enshrined\\svgSanitize\\data',
    'extends' => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\data\\XPath',
    'implements' => 
    array (
    ),
  ),
  'GrahamCampbell\\ResultType\\Error' => 
  array (
    'type' => 'class',
    'classname' => 'Error',
    'isabstract' => false,
    'namespace' => 'GrahamCampbell\\ResultType',
    'extends' => 'KadenceWP\\KadenceBlocks\\GrahamCampbell\\ResultType\\Error',
    'implements' => 
    array (
    ),
  ),
  'GrahamCampbell\\ResultType\\Result' => 
  array (
    'type' => 'class',
    'classname' => 'Result',
    'isabstract' => true,
    'namespace' => 'GrahamCampbell\\ResultType',
    'extends' => 'KadenceWP\\KadenceBlocks\\GrahamCampbell\\ResultType\\Result',
    'implements' => 
    array (
    ),
  ),
  'GrahamCampbell\\ResultType\\Success' => 
  array (
    'type' => 'class',
    'classname' => 'Success',
    'isabstract' => false,
    'namespace' => 'GrahamCampbell\\ResultType',
    'extends' => 'KadenceWP\\KadenceBlocks\\GrahamCampbell\\ResultType\\Success',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\App' => 
  array (
    'type' => 'class',
    'classname' => 'App',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\App',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\CallableBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'CallableBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\CallableBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
      1 => 'lucatume\\DI52\\Builders\\ReinitializableBuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\ClassBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ClassBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\ClassBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
      1 => 'lucatume\\DI52\\Builders\\ReinitializableBuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\ClosureBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ClosureBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\ClosureBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Factory',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\Factory',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\Parameter' => 
  array (
    'type' => 'class',
    'classname' => 'Parameter',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\Parameter',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\Resolver' => 
  array (
    'type' => 'class',
    'classname' => 'Resolver',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\Resolver',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\ValueBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ValueBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\ValueBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Container' => 
  array (
    'type' => 'class',
    'classname' => 'Container',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Container',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Psr\\Container\\ContainerInterface',
    ),
  ),
  'lucatume\\DI52\\ContainerException' => 
  array (
    'type' => 'class',
    'classname' => 'ContainerException',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\ContainerException',
    'implements' => 
    array (
      0 => 'Psr\\Container\\ContainerExceptionInterface',
    ),
  ),
  'lucatume\\DI52\\NestedParseError' => 
  array (
    'type' => 'class',
    'classname' => 'NestedParseError',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\NestedParseError',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\NotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'NotFoundException',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\NotFoundException',
    'implements' => 
    array (
      0 => 'Psr\\Container\\NotFoundExceptionInterface',
    ),
  ),
  'lucatume\\DI52\\ServiceProvider' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceProvider',
    'isabstract' => true,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\ServiceProvider',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Attribute\\AsMonologProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'AsMonologProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Attribute',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Attribute\\AsMonologProcessor',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\DateTimeImmutable' => 
  array (
    'type' => 'class',
    'classname' => 'DateTimeImmutable',
    'isabstract' => false,
    'namespace' => 'Monolog',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\DateTimeImmutable',
    'implements' => 
    array (
      0 => 'JsonSerializable',
    ),
  ),
  'Monolog\\ErrorHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ErrorHandler',
    'isabstract' => false,
    'namespace' => 'Monolog',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\ErrorHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\ChromePHPFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'ChromePHPFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\ChromePHPFormatter',
    'implements' => 
    array (
      0 => 'Monolog\\Formatter\\FormatterInterface',
    ),
  ),
  'Monolog\\Formatter\\ElasticaFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'ElasticaFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\ElasticaFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\ElasticsearchFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'ElasticsearchFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\ElasticsearchFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\FlowdockFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'FlowdockFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\FlowdockFormatter',
    'implements' => 
    array (
      0 => 'Monolog\\Formatter\\FormatterInterface',
    ),
  ),
  'Monolog\\Formatter\\FluentdFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'FluentdFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\FluentdFormatter',
    'implements' => 
    array (
      0 => 'Monolog\\Formatter\\FormatterInterface',
    ),
  ),
  'Monolog\\Formatter\\GelfMessageFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'GelfMessageFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\GelfMessageFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\GoogleCloudLoggingFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'GoogleCloudLoggingFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\GoogleCloudLoggingFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\HtmlFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'HtmlFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\HtmlFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\JsonFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'JsonFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\JsonFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\LineFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'LineFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\LineFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\LogglyFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'LogglyFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\LogglyFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\LogmaticFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'LogmaticFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\LogmaticFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\LogstashFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'LogstashFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\LogstashFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\MongoDBFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'MongoDBFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\MongoDBFormatter',
    'implements' => 
    array (
      0 => 'Monolog\\Formatter\\FormatterInterface',
    ),
  ),
  'Monolog\\Formatter\\NormalizerFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'NormalizerFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\NormalizerFormatter',
    'implements' => 
    array (
      0 => 'Monolog\\Formatter\\FormatterInterface',
    ),
  ),
  'Monolog\\Formatter\\ScalarFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'ScalarFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\ScalarFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Formatter\\WildfireFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'WildfireFormatter',
    'isabstract' => false,
    'namespace' => 'Monolog\\Formatter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\WildfireFormatter',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\AbstractHandler' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractHandler',
    'isabstract' => true,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\AbstractHandler',
    'implements' => 
    array (
      0 => 'Monolog\\ResettableInterface',
    ),
  ),
  'Monolog\\Handler\\AbstractProcessingHandler' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractProcessingHandler',
    'isabstract' => true,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\AbstractProcessingHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      1 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\AbstractSyslogHandler' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractSyslogHandler',
    'isabstract' => true,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\AbstractSyslogHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\AmqpHandler' => 
  array (
    'type' => 'class',
    'classname' => 'AmqpHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\AmqpHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\BrowserConsoleHandler' => 
  array (
    'type' => 'class',
    'classname' => 'BrowserConsoleHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\BrowserConsoleHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\BufferHandler' => 
  array (
    'type' => 'class',
    'classname' => 'BufferHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\BufferHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      1 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\ChromePHPHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ChromePHPHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ChromePHPHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\CouchDBHandler' => 
  array (
    'type' => 'class',
    'classname' => 'CouchDBHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\CouchDBHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\CubeHandler' => 
  array (
    'type' => 'class',
    'classname' => 'CubeHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\CubeHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\Curl\\Util' => 
  array (
    'type' => 'class',
    'classname' => 'Util',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler\\Curl',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\Curl\\Util',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\DeduplicationHandler' => 
  array (
    'type' => 'class',
    'classname' => 'DeduplicationHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\DeduplicationHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\DoctrineCouchDBHandler' => 
  array (
    'type' => 'class',
    'classname' => 'DoctrineCouchDBHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\DoctrineCouchDBHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\DynamoDbHandler' => 
  array (
    'type' => 'class',
    'classname' => 'DynamoDbHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\DynamoDbHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\ElasticaHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ElasticaHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ElasticaHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\ElasticsearchHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ElasticsearchHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ElasticsearchHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\ErrorLogHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ErrorLogHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ErrorLogHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\FallbackGroupHandler' => 
  array (
    'type' => 'class',
    'classname' => 'FallbackGroupHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FallbackGroupHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\FilterHandler' => 
  array (
    'type' => 'class',
    'classname' => 'FilterHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FilterHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      1 => 'Monolog\\ResettableInterface',
      2 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\FingersCrossed\\ChannelLevelActivationStrategy' => 
  array (
    'type' => 'class',
    'classname' => 'ChannelLevelActivationStrategy',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler\\FingersCrossed',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FingersCrossed\\ChannelLevelActivationStrategy',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\FingersCrossed\\ActivationStrategyInterface',
    ),
  ),
  'Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy' => 
  array (
    'type' => 'class',
    'classname' => 'ErrorLevelActivationStrategy',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler\\FingersCrossed',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\FingersCrossed\\ActivationStrategyInterface',
    ),
  ),
  'Monolog\\Handler\\FingersCrossedHandler' => 
  array (
    'type' => 'class',
    'classname' => 'FingersCrossedHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FingersCrossedHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      1 => 'Monolog\\ResettableInterface',
      2 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\FirePHPHandler' => 
  array (
    'type' => 'class',
    'classname' => 'FirePHPHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FirePHPHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\FleepHookHandler' => 
  array (
    'type' => 'class',
    'classname' => 'FleepHookHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FleepHookHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\FlowdockHandler' => 
  array (
    'type' => 'class',
    'classname' => 'FlowdockHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FlowdockHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\GelfHandler' => 
  array (
    'type' => 'class',
    'classname' => 'GelfHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\GelfHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\GroupHandler' => 
  array (
    'type' => 'class',
    'classname' => 'GroupHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\GroupHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      1 => 'Monolog\\ResettableInterface',
    ),
  ),
  'Monolog\\Handler\\Handler' => 
  array (
    'type' => 'class',
    'classname' => 'Handler',
    'isabstract' => true,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\Handler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\HandlerInterface',
    ),
  ),
  'Monolog\\Handler\\HandlerWrapper' => 
  array (
    'type' => 'class',
    'classname' => 'HandlerWrapper',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\HandlerWrapper',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\HandlerInterface',
      1 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      2 => 'Monolog\\Handler\\FormattableHandlerInterface',
      3 => 'Monolog\\ResettableInterface',
    ),
  ),
  'Monolog\\Handler\\IFTTTHandler' => 
  array (
    'type' => 'class',
    'classname' => 'IFTTTHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\IFTTTHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\InsightOpsHandler' => 
  array (
    'type' => 'class',
    'classname' => 'InsightOpsHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\InsightOpsHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\LogEntriesHandler' => 
  array (
    'type' => 'class',
    'classname' => 'LogEntriesHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\LogEntriesHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\LogglyHandler' => 
  array (
    'type' => 'class',
    'classname' => 'LogglyHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\LogglyHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\LogmaticHandler' => 
  array (
    'type' => 'class',
    'classname' => 'LogmaticHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\LogmaticHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\MailHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MailHandler',
    'isabstract' => true,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\MailHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\MandrillHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MandrillHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\MandrillHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\MissingExtensionException' => 
  array (
    'type' => 'class',
    'classname' => 'MissingExtensionException',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\MissingExtensionException',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\MongoDBHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MongoDBHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\MongoDBHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\NativeMailerHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NativeMailerHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\NativeMailerHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\NewRelicHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NewRelicHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\NewRelicHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\NoopHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NoopHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\NoopHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\NullHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NullHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\NullHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\OverflowHandler' => 
  array (
    'type' => 'class',
    'classname' => 'OverflowHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\OverflowHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\PHPConsoleHandler' => 
  array (
    'type' => 'class',
    'classname' => 'PHPConsoleHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\PHPConsoleHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\ProcessHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ProcessHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\PsrHandler' => 
  array (
    'type' => 'class',
    'classname' => 'PsrHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\PsrHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\PushoverHandler' => 
  array (
    'type' => 'class',
    'classname' => 'PushoverHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\PushoverHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\RedisHandler' => 
  array (
    'type' => 'class',
    'classname' => 'RedisHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\RedisHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\RedisPubSubHandler' => 
  array (
    'type' => 'class',
    'classname' => 'RedisPubSubHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\RedisPubSubHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\RollbarHandler' => 
  array (
    'type' => 'class',
    'classname' => 'RollbarHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\RollbarHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\RotatingFileHandler' => 
  array (
    'type' => 'class',
    'classname' => 'RotatingFileHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\RotatingFileHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SamplingHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SamplingHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SamplingHandler',
    'implements' => 
    array (
      0 => 'Monolog\\Handler\\ProcessableHandlerInterface',
      1 => 'Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\SendGridHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SendGridHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SendGridHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\Slack\\SlackRecord' => 
  array (
    'type' => 'class',
    'classname' => 'SlackRecord',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler\\Slack',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\Slack\\SlackRecord',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SlackHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SlackHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SlackHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SlackWebhookHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SlackWebhookHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SlackWebhookHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SocketHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SocketHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SocketHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SqsHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SqsHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SqsHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\StreamHandler' => 
  array (
    'type' => 'class',
    'classname' => 'StreamHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\StreamHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SwiftMailerHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SwiftMailerHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SwiftMailerHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SymfonyMailerHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SymfonyMailerHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SymfonyMailerHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SyslogHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SyslogHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SyslogHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SyslogUdp\\UdpSocket' => 
  array (
    'type' => 'class',
    'classname' => 'UdpSocket',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler\\SyslogUdp',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SyslogUdp\\UdpSocket',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\SyslogUdpHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SyslogUdpHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\SyslogUdpHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\TelegramBotHandler' => 
  array (
    'type' => 'class',
    'classname' => 'TelegramBotHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\TelegramBotHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\TestHandler' => 
  array (
    'type' => 'class',
    'classname' => 'TestHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\TestHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\WhatFailureGroupHandler' => 
  array (
    'type' => 'class',
    'classname' => 'WhatFailureGroupHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\WhatFailureGroupHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\ZendMonitorHandler' => 
  array (
    'type' => 'class',
    'classname' => 'ZendMonitorHandler',
    'isabstract' => false,
    'namespace' => 'Monolog\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ZendMonitorHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Logger' => 
  array (
    'type' => 'class',
    'classname' => 'Logger',
    'isabstract' => false,
    'namespace' => 'Monolog',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Logger',
    'implements' => 
    array (
      0 => 'Psr\\Log\\LoggerInterface',
      1 => 'Monolog\\ResettableInterface',
    ),
  ),
  'Monolog\\Processor\\GitProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'GitProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\GitProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\HostnameProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'HostnameProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\HostnameProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\IntrospectionProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'IntrospectionProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\IntrospectionProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\MemoryPeakUsageProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'MemoryPeakUsageProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\MemoryPeakUsageProcessor',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Processor\\MemoryProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'MemoryProcessor',
    'isabstract' => true,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\MemoryProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\MemoryUsageProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'MemoryUsageProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\MemoryUsageProcessor',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Processor\\MercurialProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'MercurialProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\MercurialProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\ProcessIdProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'ProcessIdProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\ProcessIdProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\PsrLogMessageProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'PsrLogMessageProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\PsrLogMessageProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\TagProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'TagProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\TagProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Processor\\UidProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'UidProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\UidProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
      1 => 'Monolog\\ResettableInterface',
    ),
  ),
  'Monolog\\Processor\\WebProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'WebProcessor',
    'isabstract' => false,
    'namespace' => 'Monolog\\Processor',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\WebProcessor',
    'implements' => 
    array (
      0 => 'Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\Registry' => 
  array (
    'type' => 'class',
    'classname' => 'Registry',
    'isabstract' => false,
    'namespace' => 'Monolog',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Registry',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\SignalHandler' => 
  array (
    'type' => 'class',
    'classname' => 'SignalHandler',
    'isabstract' => false,
    'namespace' => 'Monolog',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\SignalHandler',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Test\\TestCase' => 
  array (
    'type' => 'class',
    'classname' => 'TestCase',
    'isabstract' => false,
    'namespace' => 'Monolog\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Test\\TestCase',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Utils' => 
  array (
    'type' => 'class',
    'classname' => 'Utils',
    'isabstract' => false,
    'namespace' => 'Monolog',
    'extends' => 'KadenceWP\\KadenceBlocks\\Monolog\\Utils',
    'implements' => 
    array (
    ),
  ),
  'Nyholm\\Psr7\\Factory\\HttplugFactory' => 
  array (
    'type' => 'class',
    'classname' => 'HttplugFactory',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7\\Factory',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\Factory\\HttplugFactory',
    'implements' => 
    array (
      0 => 'Http\\Message\\MessageFactory',
      1 => 'Http\\Message\\StreamFactory',
      2 => 'Http\\Message\\UriFactory',
    ),
  ),
  'Nyholm\\Psr7\\Factory\\Psr17Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Psr17Factory',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7\\Factory',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\Factory\\Psr17Factory',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\RequestFactoryInterface',
      1 => 'Psr\\Http\\Message\\ResponseFactoryInterface',
      2 => 'Psr\\Http\\Message\\ServerRequestFactoryInterface',
      3 => 'Psr\\Http\\Message\\StreamFactoryInterface',
      4 => 'Psr\\Http\\Message\\UploadedFileFactoryInterface',
      5 => 'Psr\\Http\\Message\\UriFactoryInterface',
    ),
  ),
  'Nyholm\\Psr7\\Request' => 
  array (
    'type' => 'class',
    'classname' => 'Request',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\Request',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\RequestInterface',
    ),
  ),
  'Nyholm\\Psr7\\Response' => 
  array (
    'type' => 'class',
    'classname' => 'Response',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\Response',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\ResponseInterface',
    ),
  ),
  'Nyholm\\Psr7\\ServerRequest' => 
  array (
    'type' => 'class',
    'classname' => 'ServerRequest',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\ServerRequest',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\ServerRequestInterface',
    ),
  ),
  'Nyholm\\Psr7\\Stream' => 
  array (
    'type' => 'class',
    'classname' => 'Stream',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\Stream',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\StreamInterface',
    ),
  ),
  'Nyholm\\Psr7\\UploadedFile' => 
  array (
    'type' => 'class',
    'classname' => 'UploadedFile',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\UploadedFile',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\UploadedFileInterface',
    ),
  ),
  'Nyholm\\Psr7\\Uri' => 
  array (
    'type' => 'class',
    'classname' => 'Uri',
    'isabstract' => false,
    'namespace' => 'Nyholm\\Psr7',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\Uri',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Message\\UriInterface',
    ),
  ),
  'PhpOption\\LazyOption' => 
  array (
    'type' => 'class',
    'classname' => 'LazyOption',
    'isabstract' => false,
    'namespace' => 'PhpOption',
    'extends' => 'KadenceWP\\KadenceBlocks\\PhpOption\\LazyOption',
    'implements' => 
    array (
    ),
  ),
  'PhpOption\\None' => 
  array (
    'type' => 'class',
    'classname' => 'None',
    'isabstract' => false,
    'namespace' => 'PhpOption',
    'extends' => 'KadenceWP\\KadenceBlocks\\PhpOption\\None',
    'implements' => 
    array (
    ),
  ),
  'PhpOption\\Option' => 
  array (
    'type' => 'class',
    'classname' => 'Option',
    'isabstract' => true,
    'namespace' => 'PhpOption',
    'extends' => 'KadenceWP\\KadenceBlocks\\PhpOption\\Option',
    'implements' => 
    array (
      0 => 'IteratorAggregate',
    ),
  ),
  'PhpOption\\Some' => 
  array (
    'type' => 'class',
    'classname' => 'Some',
    'isabstract' => false,
    'namespace' => 'PhpOption',
    'extends' => 'KadenceWP\\KadenceBlocks\\PhpOption\\Some',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\AbstractLogger' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractLogger',
    'isabstract' => true,
    'namespace' => 'Psr\\Log',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\AbstractLogger',
    'implements' => 
    array (
      0 => 'Psr\\Log\\LoggerInterface',
    ),
  ),
  'Psr\\Log\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Psr\\Log',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\InvalidArgumentException',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\LogLevel' => 
  array (
    'type' => 'class',
    'classname' => 'LogLevel',
    'isabstract' => false,
    'namespace' => 'Psr\\Log',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\LogLevel',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\NullLogger' => 
  array (
    'type' => 'class',
    'classname' => 'NullLogger',
    'isabstract' => false,
    'namespace' => 'Psr\\Log',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\NullLogger',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\Test\\DummyTest' => 
  array (
    'type' => 'class',
    'classname' => 'DummyTest',
    'isabstract' => false,
    'namespace' => 'Psr\\Log\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\Test\\DummyTest',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\Test\\LoggerInterfaceTest' => 
  array (
    'type' => 'class',
    'classname' => 'LoggerInterfaceTest',
    'isabstract' => true,
    'namespace' => 'Psr\\Log\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\Test\\LoggerInterfaceTest',
    'implements' => 
    array (
    ),
  ),
  'Psr\\Log\\Test\\TestLogger' => 
  array (
    'type' => 'class',
    'classname' => 'TestLogger',
    'isabstract' => false,
    'namespace' => 'Psr\\Log\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\Test\\TestLogger',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Arrays\\Arr' => 
  array (
    'type' => 'class',
    'classname' => 'Arr',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Arrays',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Arrays\\Arr',
    'implements' => 
    array (
    ),
  ),
  'Nexcess\\Banners\\Banner' => 
  array (
    'type' => 'class',
    'classname' => 'Banner',
    'isabstract' => false,
    'namespace' => 'Nexcess\\Banners',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nexcess\\Banners\\Banner',
    'implements' => 
    array (
    ),
  ),
  'Nexcess\\Banners\\BannerFields' => 
  array (
    'type' => 'class',
    'classname' => 'BannerFields',
    'isabstract' => false,
    'namespace' => 'Nexcess\\Banners',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nexcess\\Banners\\BannerFields',
    'implements' => 
    array (
    ),
  ),
  'Nexcess\\Banners\\Dismissals' => 
  array (
    'type' => 'class',
    'classname' => 'Dismissals',
    'isabstract' => false,
    'namespace' => 'Nexcess\\Banners',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nexcess\\Banners\\Dismissals',
    'implements' => 
    array (
    ),
  ),
  'Nexcess\\Banners\\Package' => 
  array (
    'type' => 'class',
    'classname' => 'Package',
    'isabstract' => false,
    'namespace' => 'Nexcess\\Banners',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nexcess\\Banners\\Package',
    'implements' => 
    array (
    ),
  ),
  'Nexcess\\Banners\\Registry' => 
  array (
    'type' => 'class',
    'classname' => 'Registry',
    'isabstract' => false,
    'namespace' => 'Nexcess\\Banners',
    'extends' => 'KadenceWP\\KadenceBlocks\\Nexcess\\Banners\\Registry',
    'implements' => 
    array (
    ),
  ),
  'Your\\Namespace\\Container' => 
  array (
    'type' => 'class',
    'classname' => 'Container',
    'isabstract' => false,
    'namespace' => 'Your\\Namespace',
    'extends' => 'KadenceWP\\KadenceBlocks\\Your\\Namespace\\Container',
    'implements' => 
    array (
      0 => 'StellarWP\\ContainerContract\\ContainerInterface',
    ),
  ),
  'StellarWP\\DB\\Config' => 
  array (
    'type' => 'class',
    'classname' => 'Config',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\Config',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\DB' => 
  array (
    'type' => 'class',
    'classname' => 'DB',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\DB',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\Database\\Actions\\EnableBigSqlSelects' => 
  array (
    'type' => 'class',
    'classname' => 'EnableBigSqlSelects',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\Database\\Actions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\Database\\Actions\\EnableBigSqlSelects',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\Database\\Exceptions\\DatabaseQueryException' => 
  array (
    'type' => 'class',
    'classname' => 'DatabaseQueryException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\Database\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\Database\\Exceptions\\DatabaseQueryException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\Database\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\Database',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\Database\\Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\From' => 
  array (
    'type' => 'class',
    'classname' => 'From',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\From',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\Having' => 
  array (
    'type' => 'class',
    'classname' => 'Having',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\Having',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\Join' => 
  array (
    'type' => 'class',
    'classname' => 'Join',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\Join',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\JoinCondition' => 
  array (
    'type' => 'class',
    'classname' => 'JoinCondition',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\JoinCondition',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\MetaTable' => 
  array (
    'type' => 'class',
    'classname' => 'MetaTable',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\MetaTable',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\OrderBy' => 
  array (
    'type' => 'class',
    'classname' => 'OrderBy',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\OrderBy',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\RawSQL' => 
  array (
    'type' => 'class',
    'classname' => 'RawSQL',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\RawSQL',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\Select' => 
  array (
    'type' => 'class',
    'classname' => 'Select',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\Select',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\Union' => 
  array (
    'type' => 'class',
    'classname' => 'Union',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\Union',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Clauses\\Where' => 
  array (
    'type' => 'class',
    'classname' => 'Where',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Clauses',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Clauses\\Where',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\JoinQueryBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'JoinQueryBuilder',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\JoinQueryBuilder',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\QueryBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'QueryBuilder',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\QueryBuilder',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Types\\JoinType' => 
  array (
    'type' => 'class',
    'classname' => 'JoinType',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Types\\JoinType',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Types\\Math' => 
  array (
    'type' => 'class',
    'classname' => 'Math',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Types\\Math',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Types\\Operator' => 
  array (
    'type' => 'class',
    'classname' => 'Operator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Types\\Operator',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Types\\Type' => 
  array (
    'type' => 'class',
    'classname' => 'Type',
    'isabstract' => true,
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Types\\Type',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\WhereQueryBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'WhereQueryBuilder',
    'isabstract' => false,
    'namespace' => 'StellarWP\\DB\\QueryBuilder',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\WhereQueryBuilder',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\Functions\\Actions\\Display_Legacy_License_Page_Notice' => 
  array (
    'type' => 'class',
    'classname' => 'Display_Legacy_License_Page_Notice',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\Functions\\Actions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\Functions\\Actions\\Display_Legacy_License_Page_Notice',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\Functions\\Actions\\Register_Submenu' => 
  array (
    'type' => 'class',
    'classname' => 'Register_Submenu',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\Functions\\Actions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\Functions\\Actions\\Register_Submenu',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\Functions\\Global_Function_Registry' => 
  array (
    'type' => 'class',
    'classname' => 'Global_Function_Registry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\Functions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\Functions\\Global_Function_Registry',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\Functions\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\Functions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\Functions\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\Catalog_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog_Controller',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\Catalog_Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\Feature_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Feature_Controller',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\Feature_Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\Harbor_Hosts_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Harbor_Hosts_Controller',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\Harbor_Hosts_Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\Legacy_License_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Legacy_License_Controller',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\Legacy_License_Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\License_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'License_Controller',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\License_Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\License_Response' => 
  array (
    'type' => 'class',
    'classname' => 'License_Response',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\License_Response',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\API\\REST\\V1\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\API\\REST\\V1',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\API\\REST\\V1\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Admin\\Feature_Manager_Page' => 
  array (
    'type' => 'class',
    'classname' => 'Feature_Manager_Page',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Admin\\Feature_Manager_Page',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Admin\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Admin\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\CLI\\Commands\\Catalog' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\CLI\\Commands',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\CLI\\Commands\\Catalog',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\CLI\\Commands\\Feature' => 
  array (
    'type' => 'class',
    'classname' => 'Feature',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\CLI\\Commands',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\CLI\\Commands\\Feature',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\CLI\\Commands\\License' => 
  array (
    'type' => 'class',
    'classname' => 'License',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\CLI\\Commands',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\CLI\\Commands\\License',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\CLI\\Display' => 
  array (
    'type' => 'class',
    'classname' => 'Display',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\CLI',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\CLI\\Display',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\CLI\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\CLI',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\CLI\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Components\\Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Controller',
    'isabstract' => true,
    'namespace' => 'LiquidWeb\\Harbor\\Components',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Components\\Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Config' => 
  array (
    'type' => 'class',
    'classname' => 'Config',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Config',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Contracts\\Abstract_Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Abstract_Provider',
    'isabstract' => true,
    'namespace' => 'LiquidWeb\\Harbor\\Contracts',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Contracts\\Abstract_Provider',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Contracts\\Provider_Interface',
    ),
  ),
  'LiquidWeb\\Harbor\\Cron\\Actions\\Handle_Unschedule_Cron_Data_Refresh' => 
  array (
    'type' => 'class',
    'classname' => 'Handle_Unschedule_Cron_Data_Refresh',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Cron\\Actions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Cron\\Actions\\Handle_Unschedule_Cron_Data_Refresh',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Cron\\Jobs\\Refresh_Catalog_Job' => 
  array (
    'type' => 'class',
    'classname' => 'Refresh_Catalog_Job',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Cron\\Jobs',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Cron\\Jobs\\Refresh_Catalog_Job',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Cron\\Jobs\\Refresh_License_Job' => 
  array (
    'type' => 'class',
    'classname' => 'Refresh_License_Job',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Cron\\Jobs',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Cron\\Jobs\\Refresh_License_Job',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Cron\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Cron',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Cron\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Cron\\ValueObjects\\CronHook' => 
  array (
    'type' => 'class',
    'classname' => 'CronHook',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Cron\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Cron\\ValueObjects\\CronHook',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Error_Code' => 
  array (
    'type' => 'class',
    'classname' => 'Error_Code',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Error_Code',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Feature_Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Feature_Collection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Feature_Collection',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Feature_Repository' => 
  array (
    'type' => 'class',
    'classname' => 'Feature_Repository',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Feature_Repository',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Feature_Resource' => 
  array (
    'type' => 'class',
    'classname' => 'Feature_Resource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Feature_Resource',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Manager' => 
  array (
    'type' => 'class',
    'classname' => 'Manager',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Manager',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Resolve_Feature_Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Resolve_Feature_Collection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Resolve_Feature_Collection',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Strategy\\Abstract_Strategy' => 
  array (
    'type' => 'class',
    'classname' => 'Abstract_Strategy',
    'isabstract' => true,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Strategy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Strategy\\Abstract_Strategy',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Features\\Contracts\\Strategy',
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Strategy\\Installable_Strategy' => 
  array (
    'type' => 'class',
    'classname' => 'Installable_Strategy',
    'isabstract' => true,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Strategy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Strategy\\Installable_Strategy',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Strategy\\Plugin_Strategy' => 
  array (
    'type' => 'class',
    'classname' => 'Plugin_Strategy',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Strategy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Strategy\\Plugin_Strategy',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Strategy\\Service_Strategy' => 
  array (
    'type' => 'class',
    'classname' => 'Service_Strategy',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Strategy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Strategy\\Service_Strategy',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Strategy\\Strategy_Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Strategy_Factory',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Strategy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Strategy\\Strategy_Factory',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Strategy\\Theme_Strategy' => 
  array (
    'type' => 'class',
    'classname' => 'Theme_Strategy',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Strategy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Strategy\\Theme_Strategy',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Types\\Feature' => 
  array (
    'type' => 'class',
    'classname' => 'Feature',
    'isabstract' => true,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Types\\Feature',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Types\\Plugin' => 
  array (
    'type' => 'class',
    'classname' => 'Plugin',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Types\\Plugin',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Features\\Contracts\\Installable',
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Types\\Service' => 
  array (
    'type' => 'class',
    'classname' => 'Service',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Types\\Service',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Types\\Theme' => 
  array (
    'type' => 'class',
    'classname' => 'Theme',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Types',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Types\\Theme',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Features\\Contracts\\Installable',
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Update\\Plugin_Handler' => 
  array (
    'type' => 'class',
    'classname' => 'Plugin_Handler',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Update',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Update\\Plugin_Handler',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Update\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Update',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Update\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Update\\Resolve_Update_Data' => 
  array (
    'type' => 'class',
    'classname' => 'Resolve_Update_Data',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Update',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Update\\Resolve_Update_Data',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Update\\Theme_Handler' => 
  array (
    'type' => 'class',
    'classname' => 'Theme_Handler',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Update',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Update\\Theme_Handler',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Harbor' => 
  array (
    'type' => 'class',
    'classname' => 'Harbor',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Harbor',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Http\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Http\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Legacy\\Legacy_License' => 
  array (
    'type' => 'class',
    'classname' => 'Legacy_License',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Legacy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Legacy\\Legacy_License',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Legacy\\License_Repository' => 
  array (
    'type' => 'class',
    'classname' => 'License_Repository',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Legacy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Legacy\\License_Repository',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Legacy\\Notices\\License_Notice_Handler' => 
  array (
    'type' => 'class',
    'classname' => 'License_Notice_Handler',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Legacy\\Notices',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Legacy\\Notices\\License_Notice_Handler',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Legacy\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Legacy',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Legacy\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Enums\\Validation_Status' => 
  array (
    'type' => 'class',
    'classname' => 'Validation_Status',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing\\Enums',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Enums\\Validation_Status',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Error_Code' => 
  array (
    'type' => 'class',
    'classname' => 'Error_Code',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Error_Code',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\License_Manager' => 
  array (
    'type' => 'class',
    'classname' => 'License_Manager',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\License_Manager',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Product_Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Product_Collection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Product_Collection',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Registry\\Product_Registry' => 
  array (
    'type' => 'class',
    'classname' => 'Product_Registry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing\\Registry',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Registry\\Product_Registry',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Repositories\\License_Repository' => 
  array (
    'type' => 'class',
    'classname' => 'License_Repository',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing\\Repositories',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Repositories\\License_Repository',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Results\\Product_Entry' => 
  array (
    'type' => 'class',
    'classname' => 'Product_Entry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing\\Results',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Results\\Product_Entry',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Licensing\\Validation_State' => 
  array (
    'type' => 'class',
    'classname' => 'Validation_State',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Licensing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Licensing\\Validation_State',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Notice\\Notice' => 
  array (
    'type' => 'class',
    'classname' => 'Notice',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Notice',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Notice\\Notice',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Notice\\Notice_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Notice_Controller',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Notice',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Notice\\Notice_Controller',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Catalog_Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog_Collection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Catalog_Collection',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Catalog_Repository' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog_Repository',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Catalog_Repository',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Clients\\Fixture_Client' => 
  array (
    'type' => 'class',
    'classname' => 'Fixture_Client',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Clients',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Clients\\Fixture_Client',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Portal\\Clients\\Portal_Client',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Clients\\Http_Client' => 
  array (
    'type' => 'class',
    'classname' => 'Http_Client',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Clients',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Clients\\Http_Client',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Portal\\Clients\\Portal_Client',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Error_Code' => 
  array (
    'type' => 'class',
    'classname' => 'Error_Code',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Error_Code',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Herald_Legacy_Url_Builder' => 
  array (
    'type' => 'class',
    'classname' => 'Herald_Legacy_Url_Builder',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Herald_Legacy_Url_Builder',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Portal\\Contracts\\Download_Url_Builder',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Herald_Routing_Url_Builder' => 
  array (
    'type' => 'class',
    'classname' => 'Herald_Routing_Url_Builder',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Herald_Routing_Url_Builder',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Portal\\Contracts\\Download_Url_Builder',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Herald_Url_Builder' => 
  array (
    'type' => 'class',
    'classname' => 'Herald_Url_Builder',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Herald_Url_Builder',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\Portal\\Contracts\\Download_Url_Builder',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Results\\Catalog_Feature' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog_Feature',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Results',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Results\\Catalog_Feature',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Results\\Catalog_Tier' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog_Tier',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Results',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Results\\Catalog_Tier',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Results\\Product_Catalog' => 
  array (
    'type' => 'class',
    'classname' => 'Product_Catalog',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Results',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Results\\Product_Catalog',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Results\\Tier_Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Tier_Collection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Results',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Results\\Tier_Collection',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Premium_Plugin_Registry' => 
  array (
    'type' => 'class',
    'classname' => 'Premium_Plugin_Registry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Premium_Plugin_Registry',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Site\\Data' => 
  array (
    'type' => 'class',
    'classname' => 'Data',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Site',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Site\\Data',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Utils\\Cast' => 
  array (
    'type' => 'class',
    'classname' => 'Cast',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Utils\\Cast',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Utils\\Checks' => 
  array (
    'type' => 'class',
    'classname' => 'Checks',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Utils\\Checks',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Utils\\Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Collection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Utils\\Collection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'IteratorAggregate',
      2 => 'Countable',
    ),
  ),
  'LiquidWeb\\Harbor\\Utils\\License_Key' => 
  array (
    'type' => 'class',
    'classname' => 'License_Key',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Utils\\License_Key',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Utils\\Sanitize' => 
  array (
    'type' => 'class',
    'classname' => 'Sanitize',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Utils\\Sanitize',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\Utils\\Version' => 
  array (
    'type' => 'class',
    'classname' => 'Version',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Utils\\Version',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\View\\Exceptions\\FileNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'FileNotFoundException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\View\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\View\\Exceptions\\FileNotFoundException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\View\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\View',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\View\\Provider',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\Harbor\\View\\WordPress_View' => 
  array (
    'type' => 'class',
    'classname' => 'WordPress_View',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\Harbor\\View',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\View\\WordPress_View',
    'implements' => 
    array (
      0 => 'LiquidWeb\\Harbor\\View\\Contracts\\View',
    ),
  ),
  'LiquidWeb\\LicensingApiClientWordPress\\Exceptions\\WordPressHttpClientException' => 
  array (
    'type' => 'class',
    'classname' => 'WordPressHttpClientException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClientWordPress\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClientWordPress\\Exceptions\\WordPressHttpClientException',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Client\\ClientExceptionInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClientWordPress\\Http\\WordPressHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'WordPressHttpClient',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClientWordPress\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClientWordPress\\Http\\WordPressHttpClient',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Client\\ClientInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClientWordPress\\WordPressApiFactory' => 
  array (
    'type' => 'class',
    'classname' => 'WordPressApiFactory',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClientWordPress',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClientWordPress\\WordPressApiFactory',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Api' => 
  array (
    'type' => 'class',
    'classname' => 'Api',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Api',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Contracts\\LicensingClientInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\ApiBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ApiBuilder',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\ApiBuilder',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Config' => 
  array (
    'type' => 'class',
    'classname' => 'Config',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Config',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\ApiResponseException' => 
  array (
    'type' => 'class',
    'classname' => 'ApiResponseException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\ApiResponseException',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts\\ApiErrorExceptionInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\AuthenticationException' => 
  array (
    'type' => 'class',
    'classname' => 'AuthenticationException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\AuthenticationException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\AuthorizationException' => 
  array (
    'type' => 'class',
    'classname' => 'AuthorizationException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\AuthorizationException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\ClientErrorException' => 
  array (
    'type' => 'class',
    'classname' => 'ClientErrorException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\ClientErrorException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\ConflictException' => 
  array (
    'type' => 'class',
    'classname' => 'ConflictException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\ConflictException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\DecodingException' => 
  array (
    'type' => 'class',
    'classname' => 'DecodingException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\DecodingException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\MissingAuthenticationException' => 
  array (
    'type' => 'class',
    'classname' => 'MissingAuthenticationException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\MissingAuthenticationException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\NotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'NotFoundException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\NotFoundException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\ServerErrorException' => 
  array (
    'type' => 'class',
    'classname' => 'ServerErrorException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\ServerErrorException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\UnexpectedResponseException' => 
  array (
    'type' => 'class',
    'classname' => 'UnexpectedResponseException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\UnexpectedResponseException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\ValidationException' => 
  array (
    'type' => 'class',
    'classname' => 'ValidationException',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\ValidationException',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\ApiUri' => 
  array (
    'type' => 'class',
    'classname' => 'ApiUri',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\ApiUri',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\ApiVersion' => 
  array (
    'type' => 'class',
    'classname' => 'ApiVersion',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\ApiVersion',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\AuthContext' => 
  array (
    'type' => 'class',
    'classname' => 'AuthContext',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\AuthContext',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\AuthState' => 
  array (
    'type' => 'class',
    'classname' => 'AuthState',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\AuthState',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\Factories\\ApiUriFactory' => 
  array (
    'type' => 'class',
    'classname' => 'ApiUriFactory',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http\\Factories',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\Factories\\ApiUriFactory',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\Factories\\ResponseExceptionFactory' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseExceptionFactory',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http\\Factories',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\Factories\\ResponseExceptionFactory',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\JsonDecoder' => 
  array (
    'type' => 'class',
    'classname' => 'JsonDecoder',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\JsonDecoder',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\RequestBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'RequestBuilder',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\RequestBuilder',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\RequestExecutor' => 
  array (
    'type' => 'class',
    'classname' => 'RequestExecutor',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\RequestExecutor',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\RequestHeaderCollection' => 
  array (
    'type' => 'class',
    'classname' => 'RequestHeaderCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\RequestHeaderCollection',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Http\\RetryPolicy' => 
  array (
    'type' => 'class',
    'classname' => 'RetryPolicy',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Http',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Http\\RetryPolicy',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\CreatePool' => 
  array (
    'type' => 'class',
    'classname' => 'CreatePool',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\CreatePool',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\DeletePool' => 
  array (
    'type' => 'class',
    'classname' => 'DeletePool',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\DeletePool',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\ListLedgerEntries' => 
  array (
    'type' => 'class',
    'classname' => 'ListLedgerEntries',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\ListLedgerEntries',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\RecordUsage' => 
  array (
    'type' => 'class',
    'classname' => 'RecordUsage',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\RecordUsage',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\Refund' => 
  array (
    'type' => 'class',
    'classname' => 'Refund',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\Refund',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\SetQuota' => 
  array (
    'type' => 'class',
    'classname' => 'SetQuota',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\SetQuota',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Credit\\UpdatePool' => 
  array (
    'type' => 'class',
    'classname' => 'UpdatePool',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Credit\\UpdatePool',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\SwitchTier' => 
  array (
    'type' => 'class',
    'classname' => 'SwitchTier',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\SwitchTier',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\Upsert' => 
  array (
    'type' => 'class',
    'classname' => 'Upsert',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\Upsert',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\ValueObjects\\UpsertProduct' => 
  array (
    'type' => 'class',
    'classname' => 'UpsertProduct',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Entitlement\\ValueObjects\\UpsertProduct',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\Activate' => 
  array (
    'type' => 'class',
    'classname' => 'Activate',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\Activate',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\ImportAliases' => 
  array (
    'type' => 'class',
    'classname' => 'ImportAliases',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\ImportAliases',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\RemoveAliases' => 
  array (
    'type' => 'class',
    'classname' => 'RemoveAliases',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\RemoveAliases',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\ValueObjects\\ImportAlias' => 
  array (
    'type' => 'class',
    'classname' => 'ImportAlias',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\Alias\\ValueObjects\\ImportAlias',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\Deactivate' => 
  array (
    'type' => 'class',
    'classname' => 'Deactivate',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\Deactivate',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\DeleteActivation' => 
  array (
    'type' => 'class',
    'classname' => 'DeleteActivation',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\DeleteActivation',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\LicenseReference' => 
  array (
    'type' => 'class',
    'classname' => 'LicenseReference',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\LicenseReference',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\Listing\\ListRequest' => 
  array (
    'type' => 'class',
    'classname' => 'ListRequest',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License\\Listing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\Listing\\ListRequest',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\License\\RegenerateKey' => 
  array (
    'type' => 'class',
    'classname' => 'RegenerateKey',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\License\\RegenerateKey',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Token\\Create' => 
  array (
    'type' => 'class',
    'classname' => 'Create',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Token\\Create',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Requests\\Token\\Revoke' => 
  array (
    'type' => 'class',
    'classname' => 'Revoke',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Requests\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Requests\\Token\\Revoke',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsLedgerResource' => 
  array (
    'type' => 'class',
    'classname' => 'CreditsLedgerResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsLedgerResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsLedgerResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsPoolsResource' => 
  array (
    'type' => 'class',
    'classname' => 'CreditsPoolsResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsPoolsResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsPoolsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsQuotasResource' => 
  array (
    'type' => 'class',
    'classname' => 'CreditsQuotasResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsQuotasResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsQuotasResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsResource' => 
  array (
    'type' => 'class',
    'classname' => 'CreditsResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Credit\\CreditsResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\EntitlementsResource' => 
  array (
    'type' => 'class',
    'classname' => 'EntitlementsResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\EntitlementsResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\EntitlementsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\LicensesResource' => 
  array (
    'type' => 'class',
    'classname' => 'LicensesResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\LicensesResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\LicensesResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\ProductsResource' => 
  array (
    'type' => 'class',
    'classname' => 'ProductsResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\ProductsResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\ProductsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\TokensResource' => 
  array (
    'type' => 'class',
    'classname' => 'TokensResource',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\TokensResource',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\TokensResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\BalanceCollection' => 
  array (
    'type' => 'class',
    'classname' => 'BalanceCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\BalanceCollection',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\DeletePool' => 
  array (
    'type' => 'class',
    'classname' => 'DeletePool',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\DeletePool',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\DeleteQuota' => 
  array (
    'type' => 'class',
    'classname' => 'DeleteQuota',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\DeleteQuota',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\LedgerPage' => 
  array (
    'type' => 'class',
    'classname' => 'LedgerPage',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\LedgerPage',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\PoolCollection' => 
  array (
    'type' => 'class',
    'classname' => 'PoolCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\PoolCollection',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\QuotaCollection' => 
  array (
    'type' => 'class',
    'classname' => 'QuotaCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\QuotaCollection',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\RecordUsage' => 
  array (
    'type' => 'class',
    'classname' => 'RecordUsage',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\RecordUsage',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\Refund' => 
  array (
    'type' => 'class',
    'classname' => 'Refund',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\Refund',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\BalanceEntry' => 
  array (
    'type' => 'class',
    'classname' => 'BalanceEntry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\BalanceEntry',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\CreditPool' => 
  array (
    'type' => 'class',
    'classname' => 'CreditPool',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\CreditPool',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\LedgerEntry' => 
  array (
    'type' => 'class',
    'classname' => 'LedgerEntry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\LedgerEntry',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\PoolBalance' => 
  array (
    'type' => 'class',
    'classname' => 'PoolBalance',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\PoolBalance',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\SiteQuota' => 
  array (
    'type' => 'class',
    'classname' => 'SiteQuota',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Credit\\ValueObjects\\SiteQuota',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Cancel' => 
  array (
    'type' => 'class',
    'classname' => 'Cancel',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Cancel',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Delete' => 
  array (
    'type' => 'class',
    'classname' => 'Delete',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Delete',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Suspend' => 
  array (
    'type' => 'class',
    'classname' => 'Suspend',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Suspend',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\SwitchTier' => 
  array (
    'type' => 'class',
    'classname' => 'SwitchTier',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\SwitchTier',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Unsuspend' => 
  array (
    'type' => 'class',
    'classname' => 'Unsuspend',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Unsuspend',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Upsert' => 
  array (
    'type' => 'class',
    'classname' => 'Upsert',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\Upsert',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\ValueObjects\\UpsertProduct' => 
  array (
    'type' => 'class',
    'classname' => 'UpsertProduct',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Entitlement\\ValueObjects\\UpsertProduct',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\ErrorResponse' => 
  array (
    'type' => 'class',
    'classname' => 'ErrorResponse',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\ErrorResponse',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Activate' => 
  array (
    'type' => 'class',
    'classname' => 'Activate',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Activate',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\ImportAliases' => 
  array (
    'type' => 'class',
    'classname' => 'ImportAliases',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\ImportAliases',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\RemoveAliases' => 
  array (
    'type' => 'class',
    'classname' => 'RemoveAliases',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\RemoveAliases',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\ValueObjects\\ImportedAlias' => 
  array (
    'type' => 'class',
    'classname' => 'ImportedAlias',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Alias\\ValueObjects\\ImportedAlias',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Deactivate' => 
  array (
    'type' => 'class',
    'classname' => 'Deactivate',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Deactivate',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\DeleteActivation' => 
  array (
    'type' => 'class',
    'classname' => 'DeleteActivation',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\DeleteActivation',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\Listing' => 
  array (
    'type' => 'class',
    'classname' => 'Listing',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\Listing',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects\\LicenseListItem' => 
  array (
    'type' => 'class',
    'classname' => 'LicenseListItem',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects\\LicenseListItem',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects\\ListedProduct' => 
  array (
    'type' => 'class',
    'classname' => 'ListedProduct',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects\\ListedProduct',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects\\ListedProductCollection' => 
  array (
    'type' => 'class',
    'classname' => 'ListedProductCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Listing\\ValueObjects\\ListedProductCollection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'IteratorAggregate',
      3 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\RegenerateKey' => 
  array (
    'type' => 'class',
    'classname' => 'RegenerateKey',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\RegenerateKey',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\StatusChange' => 
  array (
    'type' => 'class',
    'classname' => 'StatusChange',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\StatusChange',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\Validate' => 
  array (
    'type' => 'class',
    'classname' => 'Validate',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\Validate',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValidatedProductCollection' => 
  array (
    'type' => 'class',
    'classname' => 'ValidatedProductCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValidatedProductCollection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'IteratorAggregate',
      3 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\Activation' => 
  array (
    'type' => 'class',
    'classname' => 'Activation',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\Activation',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\ActivationEntitlement' => 
  array (
    'type' => 'class',
    'classname' => 'ActivationEntitlement',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\ActivationEntitlement',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\AvailableEntitlement' => 
  array (
    'type' => 'class',
    'classname' => 'AvailableEntitlement',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\AvailableEntitlement',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\Entitlement' => 
  array (
    'type' => 'class',
    'classname' => 'Entitlement',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\Entitlement',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\LicenseSummary' => 
  array (
    'type' => 'class',
    'classname' => 'LicenseSummary',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\LicenseSummary',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\ProductValidation' => 
  array (
    'type' => 'class',
    'classname' => 'ProductValidation',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\License\\ValueObjects\\ProductValidation',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Product\\Catalog' => 
  array (
    'type' => 'class',
    'classname' => 'Catalog',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Product',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Product\\Catalog',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Product\\CatalogProductCollection' => 
  array (
    'type' => 'class',
    'classname' => 'CatalogProductCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Product',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Product\\CatalogProductCollection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'IteratorAggregate',
      3 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects\\ActivationDomain' => 
  array (
    'type' => 'class',
    'classname' => 'ActivationDomain',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects\\ActivationDomain',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects\\Activations' => 
  array (
    'type' => 'class',
    'classname' => 'Activations',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects\\Activations',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects\\CatalogEntry' => 
  array (
    'type' => 'class',
    'classname' => 'CatalogEntry',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Product\\ValueObjects\\CatalogEntry',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Token\\Auth' => 
  array (
    'type' => 'class',
    'classname' => 'Auth',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Token\\Auth',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Token\\TokenList' => 
  array (
    'type' => 'class',
    'classname' => 'TokenList',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Token\\TokenList',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Token\\ValueObjects\\TokenItem' => 
  array (
    'type' => 'class',
    'classname' => 'TokenItem',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Token\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Token\\ValueObjects\\TokenItem',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects\\CapabilityCollection' => 
  array (
    'type' => 'class',
    'classname' => 'CapabilityCollection',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects\\CapabilityCollection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'IteratorAggregate',
      3 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects\\PageMeta' => 
  array (
    'type' => 'class',
    'classname' => 'PageMeta',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects\\PageMeta',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects\\PaginationLinks' => 
  array (
    'type' => 'class',
    'classname' => 'PaginationLinks',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\ValueObjects\\PaginationLinks',
    'implements' => 
    array (
      0 => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Tracing\\TraceContext' => 
  array (
    'type' => 'class',
    'classname' => 'TraceContext',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Tracing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Tracing\\TraceContext',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Tracing\\TraceParent' => 
  array (
    'type' => 'class',
    'classname' => 'TraceParent',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Tracing',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Tracing\\TraceParent',
    'implements' => 
    array (
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Value\\AuthToken' => 
  array (
    'type' => 'class',
    'classname' => 'AuthToken',
    'isabstract' => false,
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Value',
    'extends' => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Value\\AuthToken',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Container\\ContainerAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ContainerAdapter',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Container',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Container\\ContainerAdapter',
    'implements' => 
    array (
      0 => 'StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Container',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => true,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Container\\Contracts',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Provider',
    'implements' => 
    array (
      0 => 'StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Providable',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Exceptions\\ImageDownloadException' => 
  array (
    'type' => 'class',
    'classname' => 'ImageDownloadException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Exceptions\\ImageDownloadException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\FileNameProcessor' => 
  array (
    'type' => 'class',
    'classname' => 'FileNameProcessor',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\FileNameProcessor',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\ImageDownloader' => 
  array (
    'type' => 'class',
    'classname' => 'ImageDownloader',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\ImageDownloader',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\ImageProvider' => 
  array (
    'type' => 'class',
    'classname' => 'ImageProvider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\ImageProvider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Models\\DownloadedImage' => 
  array (
    'type' => 'class',
    'classname' => 'DownloadedImage',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Models',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Models\\DownloadedImage',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Models\\ResponseAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseAdapter',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Models',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Models\\ResponseAdapter',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\FileNameSanitizer' => 
  array (
    'type' => 'class',
    'classname' => 'FileNameSanitizer',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\FileNameSanitizer',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Sanitizers\\DefaultFileNameSanitizer' => 
  array (
    'type' => 'class',
    'classname' => 'DefaultFileNameSanitizer',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Sanitizers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Sanitizers\\DefaultFileNameSanitizer',
    'implements' => 
    array (
      0 => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Contracts\\Sanitizer',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Sanitizers\\WPFileNameSanitizer' => 
  array (
    'type' => 'class',
    'classname' => 'WPFileNameSanitizer',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Sanitizers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Sanitizers\\WPFileNameSanitizer',
    'implements' => 
    array (
      0 => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Contracts\\Sanitizer',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Log\\Formatters\\ColoredLineFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'ColoredLineFormatter',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Log\\Formatters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Log\\Formatters\\ColoredLineFormatter',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Log\\Handlers\\NullHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NullHandler',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Log\\Handlers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Log\\Handlers\\NullHandler',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Log\\LogLevel' => 
  array (
    'type' => 'class',
    'classname' => 'LogLevel',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Log',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Log\\LogLevel',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Log\\LogProvider' => 
  array (
    'type' => 'class',
    'classname' => 'LogProvider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Log',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Log\\LogProvider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Storage\\Drivers\\LocalStorage' => 
  array (
    'type' => 'class',
    'classname' => 'LocalStorage',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Storage\\Drivers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Storage\\Drivers\\LocalStorage',
    'implements' => 
    array (
      0 => 'StellarWP\\ProphecyMonorepo\\Storage\\Contracts\\Storage',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Storage\\Exceptions\\NotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'NotFoundException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Storage\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Storage\\Exceptions\\NotFoundException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Storage\\Exceptions\\StorageException' => 
  array (
    'type' => 'class',
    'classname' => 'StorageException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Storage\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Storage\\Exceptions\\StorageException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Activation' => 
  array (
    'type' => 'class',
    'classname' => 'Activation',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Activation',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Builder' => 
  array (
    'type' => 'class',
    'classname' => 'Builder',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Builder',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Config' => 
  array (
    'type' => 'class',
    'classname' => 'Config',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Config',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Fields\\Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Collection',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema\\Fields',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Fields\\Collection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'Iterator',
    ),
  ),
  'StellarWP\\Schema\\Fields\\Contracts\\Field' => 
  array (
    'type' => 'class',
    'classname' => 'Field',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Schema\\Fields\\Contracts',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Fields\\Contracts\\Field',
    'implements' => 
    array (
      0 => 'StellarWP\\Schema\\Fields\\Contracts\\Schema_Interface',
    ),
  ),
  'StellarWP\\Schema\\Fields\\Filters\\Table_FilterIterator' => 
  array (
    'type' => 'class',
    'classname' => 'Table_FilterIterator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema\\Fields\\Filters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Fields\\Filters\\Table_FilterIterator',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'StellarWP\\Schema\\Full_Activation_Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Full_Activation_Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Full_Activation_Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Register' => 
  array (
    'type' => 'class',
    'classname' => 'Register',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Register',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Schema' => 
  array (
    'type' => 'class',
    'classname' => 'Schema',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Schema',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Schema\\Tables\\Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Collection',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema\\Tables',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Tables\\Collection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Countable',
      2 => 'Iterator',
    ),
  ),
  'StellarWP\\Schema\\Tables\\Contracts\\Table' => 
  array (
    'type' => 'class',
    'classname' => 'Table',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Schema\\Tables\\Contracts',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Tables\\Contracts\\Table',
    'implements' => 
    array (
      0 => 'StellarWP\\Schema\\Tables\\Contracts\\Schema_Interface',
    ),
  ),
  'StellarWP\\Schema\\Tables\\Filters\\Group_FilterIterator' => 
  array (
    'type' => 'class',
    'classname' => 'Group_FilterIterator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema\\Tables\\Filters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Tables\\Filters\\Group_FilterIterator',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'StellarWP\\Schema\\Tables\\Filters\\Needs_Update_FilterIterator' => 
  array (
    'type' => 'class',
    'classname' => 'Needs_Update_FilterIterator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Schema\\Tables\\Filters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Tables\\Filters\\Needs_Update_FilterIterator',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'StellarWP\\SuperGlobals\\SuperGlobals' => 
  array (
    'type' => 'class',
    'classname' => 'SuperGlobals',
    'isabstract' => false,
    'namespace' => 'StellarWP\\SuperGlobals',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\SuperGlobals\\SuperGlobals',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Admin\\Admin_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Admin_Subscriber',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Admin\\Admin_Subscriber',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Admin\\Resources' => 
  array (
    'type' => 'class',
    'classname' => 'Resources',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Admin\\Resources',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Config' => 
  array (
    'type' => 'class',
    'classname' => 'Config',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Config',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Contracts\\Abstract_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Abstract_Subscriber',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Telemetry\\Contracts',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Contracts\\Abstract_Subscriber',
    'implements' => 
    array (
      0 => 'StellarWP\\Telemetry\\Contracts\\Subscriber_Interface',
    ),
  ),
  'StellarWP\\Telemetry\\Core' => 
  array (
    'type' => 'class',
    'classname' => 'Core',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Core',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Data_Providers\\Debug_Data' => 
  array (
    'type' => 'class',
    'classname' => 'Debug_Data',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Data_Providers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Data_Providers\\Debug_Data',
    'implements' => 
    array (
      0 => 'StellarWP\\Telemetry\\Contracts\\Data_Provider',
    ),
  ),
  'StellarWP\\Telemetry\\Data_Providers\\Null_Data_Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Null_Data_Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Data_Providers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Data_Providers\\Null_Data_Provider',
    'implements' => 
    array (
      0 => 'StellarWP\\Telemetry\\Contracts\\Data_Provider',
    ),
  ),
  'StellarWP\\Telemetry\\Events\\Event' => 
  array (
    'type' => 'class',
    'classname' => 'Event',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Events',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Events\\Event',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Events\\Event_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Event_Subscriber',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Events',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Events\\Event_Subscriber',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Exit_Interview\\Exit_Interview_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Exit_Interview_Subscriber',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Exit_Interview',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Exit_Interview\\Exit_Interview_Subscriber',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Exit_Interview\\Template' => 
  array (
    'type' => 'class',
    'classname' => 'Template',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Exit_Interview',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Exit_Interview\\Template',
    'implements' => 
    array (
      0 => 'StellarWP\\Telemetry\\Contracts\\Template_Interface',
    ),
  ),
  'StellarWP\\Telemetry\\Last_Send\\Last_Send' => 
  array (
    'type' => 'class',
    'classname' => 'Last_Send',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Last_Send',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Last_Send\\Last_Send',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Last_Send\\Last_Send_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Last_Send_Subscriber',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Last_Send',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Last_Send\\Last_Send_Subscriber',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Opt_In\\Opt_In_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Opt_In_Subscriber',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Opt_In',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Opt_In\\Opt_In_Subscriber',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Opt_In\\Opt_In_Template' => 
  array (
    'type' => 'class',
    'classname' => 'Opt_In_Template',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Opt_In',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Opt_In\\Opt_In_Template',
    'implements' => 
    array (
      0 => 'StellarWP\\Telemetry\\Contracts\\Template_Interface',
    ),
  ),
  'StellarWP\\Telemetry\\Opt_In\\Status' => 
  array (
    'type' => 'class',
    'classname' => 'Status',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Opt_In',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Opt_In\\Status',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Telemetry\\Telemetry' => 
  array (
    'type' => 'class',
    'classname' => 'Telemetry',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Telemetry',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Telemetry\\Telemetry',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Telemetry\\Telemetry_Subscriber' => 
  array (
    'type' => 'class',
    'classname' => 'Telemetry_Subscriber',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry\\Telemetry',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Telemetry\\Telemetry_Subscriber',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Telemetry\\Uninstall' => 
  array (
    'type' => 'class',
    'classname' => 'Uninstall',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Telemetry',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Uninstall',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\API\\Client' => 
  array (
    'type' => 'class',
    'classname' => 'Client',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\Client',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Auth\\Auth_Url' => 
  array (
    'type' => 'class',
    'classname' => 'Auth_Url',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Auth\\Auth_Url',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Auth_Url',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Auth\\Auth_Url_Cache_Decorator' => 
  array (
    'type' => 'class',
    'classname' => 'Auth_Url_Cache_Decorator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Auth\\Auth_Url_Cache_Decorator',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Auth_Url',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Auth\\Token_Authorizer' => 
  array (
    'type' => 'class',
    'classname' => 'Token_Authorizer',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Auth\\Token_Authorizer',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Token_Authorizer',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Auth\\Token_Authorizer_Cache_Decorator' => 
  array (
    'type' => 'class',
    'classname' => 'Token_Authorizer_Cache_Decorator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Auth\\Token_Authorizer_Cache_Decorator',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Token_Authorizer',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Client' => 
  array (
    'type' => 'class',
    'classname' => 'Client',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API\\V3',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Client',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\API\\V3\\Contracts\\Client_V3',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API\\V3',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\API\\Validation_Response' => 
  array (
    'type' => 'class',
    'classname' => 'Validation_Response',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\API',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\Validation_Response',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Ajax' => 
  array (
    'type' => 'class',
    'classname' => 'Ajax',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Ajax',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Field' => 
  array (
    'type' => 'class',
    'classname' => 'Field',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Field',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\License_Field' => 
  array (
    'type' => 'class',
    'classname' => 'License_Field',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\License_Field',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Notice' => 
  array (
    'type' => 'class',
    'classname' => 'Notice',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Notice',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Package_Handler' => 
  array (
    'type' => 'class',
    'classname' => 'Package_Handler',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Package_Handler',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Plugins_Page' => 
  array (
    'type' => 'class',
    'classname' => 'Plugins_Page',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Plugins_Page',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Admin\\Update_Prevention' => 
  array (
    'type' => 'class',
    'classname' => 'Update_Prevention',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Admin\\Update_Prevention',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Action_Manager' => 
  array (
    'type' => 'class',
    'classname' => 'Action_Manager',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Action_Manager',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Admin\\Connect_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Connect_Controller',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Admin\\Connect_Controller',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Admin\\Disconnect_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Disconnect_Controller',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Admin\\Disconnect_Controller',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Auth_Url_Builder' => 
  array (
    'type' => 'class',
    'classname' => 'Auth_Url_Builder',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Auth_Url_Builder',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Authorizer' => 
  array (
    'type' => 'class',
    'classname' => 'Authorizer',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Authorizer',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\License\\License_Manager' => 
  array (
    'type' => 'class',
    'classname' => 'License_Manager',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\License',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\License\\License_Manager',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Domain_Mapping' => 
  array (
    'type' => 'class',
    'classname' => 'Multisite_Domain_Mapping',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Domain_Mapping',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Main_Site' => 
  array (
    'type' => 'class',
    'classname' => 'Multisite_Main_Site',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Main_Site',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Subdomain' => 
  array (
    'type' => 'class',
    'classname' => 'Multisite_Subdomain',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Subdomain',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Subfolder' => 
  array (
    'type' => 'class',
    'classname' => 'Multisite_Subfolder',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\License\\Pipeline\\Processors\\Multisite_Subfolder',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Nonce' => 
  array (
    'type' => 'class',
    'classname' => 'Nonce',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Nonce',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Connector' => 
  array (
    'type' => 'class',
    'classname' => 'Connector',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Connector',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Disconnector' => 
  array (
    'type' => 'class',
    'classname' => 'Disconnector',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Disconnector',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Exceptions\\InvalidTokenException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidTokenException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Exceptions\\InvalidTokenException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Managers\\Network_Token_Manager' => 
  array (
    'type' => 'class',
    'classname' => 'Network_Token_Manager',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token\\Managers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Managers\\Network_Token_Manager',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Managers\\Token_Manager' => 
  array (
    'type' => 'class',
    'classname' => 'Token_Manager',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token\\Managers',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Managers\\Token_Manager',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\Auth\\Token\\Contracts\\Token_Manager',
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Token_Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Token_Factory',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Token_Factory',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Components\\Admin\\Authorize_Button_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Authorize_Button_Controller',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Components\\Admin',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Components\\Admin\\Authorize_Button_Controller',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Components\\Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Controller',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Uplink\\Components',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Components\\Controller',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Config' => 
  array (
    'type' => 'class',
    'classname' => 'Config',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Config',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Contracts\\Abstract_Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Abstract_Provider',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Uplink\\Contracts',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Contracts\\Abstract_Provider',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\Contracts\\Provider_Interface',
    ),
  ),
  'StellarWP\\Uplink\\Exceptions\\ResourceAlreadyRegisteredException' => 
  array (
    'type' => 'class',
    'classname' => 'ResourceAlreadyRegisteredException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Exceptions\\ResourceAlreadyRegisteredException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\API' => 
  array (
    'type' => 'class',
    'classname' => 'API',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\API',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Expired_Key' => 
  array (
    'type' => 'class',
    'classname' => 'Expired_Key',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Expired_Key',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Message_Abstract' => 
  array (
    'type' => 'class',
    'classname' => 'Message_Abstract',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Message_Abstract',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Network_Licensed' => 
  array (
    'type' => 'class',
    'classname' => 'Network_Licensed',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Network_Licensed',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Network_Unlicensed' => 
  array (
    'type' => 'class',
    'classname' => 'Network_Unlicensed',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Network_Unlicensed',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Network_Expired' => 
  array (
    'type' => 'class',
    'classname' => 'Network_Expired',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Network_Expired',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Unlicensed' => 
  array (
    'type' => 'class',
    'classname' => 'Unlicensed',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Unlicensed',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Unreachable' => 
  array (
    'type' => 'class',
    'classname' => 'Unreachable',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Unreachable',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Update_Available' => 
  array (
    'type' => 'class',
    'classname' => 'Update_Available',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Update_Available',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Update_Now' => 
  array (
    'type' => 'class',
    'classname' => 'Update_Now',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Update_Now',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Messages\\Valid_Key' => 
  array (
    'type' => 'class',
    'classname' => 'Valid_Key',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Messages',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Messages\\Valid_Key',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Notice\\Notice' => 
  array (
    'type' => 'class',
    'classname' => 'Notice',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Notice',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Notice\\Notice',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Notice\\Notice_Controller' => 
  array (
    'type' => 'class',
    'classname' => 'Notice_Controller',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Notice',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Notice\\Notice_Controller',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Notice\\Notice_Handler' => 
  array (
    'type' => 'class',
    'classname' => 'Notice_Handler',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Notice',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Notice\\Notice_Handler',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Notice\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Notice',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Notice\\Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Pipeline\\Pipeline' => 
  array (
    'type' => 'class',
    'classname' => 'Pipeline',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Pipeline',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Pipeline\\Pipeline',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Register' => 
  array (
    'type' => 'class',
    'classname' => 'Register',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Register',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Collection' => 
  array (
    'type' => 'class',
    'classname' => 'Collection',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Collection',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Iterator',
      2 => 'Countable',
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Filters\\Path_FilterIterator' => 
  array (
    'type' => 'class',
    'classname' => 'Path_FilterIterator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources\\Filters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Filters\\Path_FilterIterator',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Filters\\Plugin_FilterIterator' => 
  array (
    'type' => 'class',
    'classname' => 'Plugin_FilterIterator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources\\Filters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Filters\\Plugin_FilterIterator',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Filters\\Service_FilterIterator' => 
  array (
    'type' => 'class',
    'classname' => 'Service_FilterIterator',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources\\Filters',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Filters\\Service_FilterIterator',
    'implements' => 
    array (
      0 => 'Countable',
    ),
  ),
  'StellarWP\\Uplink\\Resources\\License' => 
  array (
    'type' => 'class',
    'classname' => 'License',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\License',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Plugin' => 
  array (
    'type' => 'class',
    'classname' => 'Plugin',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Plugin',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Resource' => 
  array (
    'type' => 'class',
    'classname' => 'Resource',
    'isabstract' => true,
    'namespace' => 'StellarWP\\Uplink\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Resource',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Resources\\Service' => 
  array (
    'type' => 'class',
    'classname' => 'Service',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Resources',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Resources\\Service',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Site\\Data' => 
  array (
    'type' => 'class',
    'classname' => 'Data',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Site',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Site\\Data',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Uplink' => 
  array (
    'type' => 'class',
    'classname' => 'Uplink',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Uplink',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Utils\\Checks' => 
  array (
    'type' => 'class',
    'classname' => 'Checks',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Utils\\Checks',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\Utils\\Sanitize' => 
  array (
    'type' => 'class',
    'classname' => 'Sanitize',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\Utils',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Utils\\Sanitize',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\View\\Exceptions\\FileNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'FileNotFoundException',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\View\\Exceptions',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\View\\Exceptions\\FileNotFoundException',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\View\\Provider' => 
  array (
    'type' => 'class',
    'classname' => 'Provider',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\View',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\View\\Provider',
    'implements' => 
    array (
    ),
  ),
  'StellarWP\\Uplink\\View\\WordPress_View' => 
  array (
    'type' => 'class',
    'classname' => 'WordPress_View',
    'isabstract' => false,
    'namespace' => 'StellarWP\\Uplink\\View',
    'extends' => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\View\\WordPress_View',
    'implements' => 
    array (
      0 => 'StellarWP\\Uplink\\View\\Contracts\\View',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\FileNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'FileNotFoundException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Exception\\FileNotFoundException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\IOException' => 
  array (
    'type' => 'class',
    'classname' => 'IOException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Exception\\IOException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Filesystem\\Exception\\IOExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Filesystem' => 
  array (
    'type' => 'class',
    'classname' => 'Filesystem',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Filesystem',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Filesystem\\Path' => 
  array (
    'type' => 'class',
    'classname' => 'Path',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Filesystem',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Path',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Test\\HttpClientTestCase' => 
  array (
    'type' => 'class',
    'classname' => 'HttpClientTestCase',
    'isabstract' => true,
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Test\\HttpClientTestCase',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Test\\TestHttpServer' => 
  array (
    'type' => 'class',
    'classname' => 'TestHttpServer',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Test\\TestHttpServer',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\AmpHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'AmpHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\AmpHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Psr\\Log\\LoggerAwareInterface',
      2 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\CachingHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'CachingHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\CachingHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Chunk\\DataChunk' => 
  array (
    'type' => 'class',
    'classname' => 'DataChunk',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Chunk',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Chunk\\DataChunk',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ChunkInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Chunk\\ErrorChunk' => 
  array (
    'type' => 'class',
    'classname' => 'ErrorChunk',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Chunk',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Chunk\\ErrorChunk',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ChunkInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Chunk\\FirstChunk' => 
  array (
    'type' => 'class',
    'classname' => 'FirstChunk',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Chunk',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Chunk\\FirstChunk',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Chunk\\InformationalChunk' => 
  array (
    'type' => 'class',
    'classname' => 'InformationalChunk',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Chunk',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Chunk\\InformationalChunk',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Chunk\\LastChunk' => 
  array (
    'type' => 'class',
    'classname' => 'LastChunk',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Chunk',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Chunk\\LastChunk',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Chunk\\ServerSentEvent' => 
  array (
    'type' => 'class',
    'classname' => 'ServerSentEvent',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Chunk',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Chunk\\ServerSentEvent',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ChunkInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\CurlHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'CurlHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\CurlHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Psr\\Log\\LoggerAwareInterface',
      2 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\DataCollector\\HttpClientDataCollector' => 
  array (
    'type' => 'class',
    'classname' => 'HttpClientDataCollector',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\DataCollector',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\DataCollector\\HttpClientDataCollector',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpKernel\\DataCollector\\LateDataCollectorInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\DependencyInjection\\HttpClientPass' => 
  array (
    'type' => 'class',
    'classname' => 'HttpClientPass',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\DependencyInjection',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\DependencyInjection\\HttpClientPass',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\DependencyInjection\\Compiler\\CompilerPassInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\EventSourceHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'EventSourceHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\EventSourceHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\ClientException' => 
  array (
    'type' => 'class',
    'classname' => 'ClientException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\ClientException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\ClientExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\EventSourceException' => 
  array (
    'type' => 'class',
    'classname' => 'EventSourceException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\EventSourceException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\DecodingExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\TransportExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\JsonException' => 
  array (
    'type' => 'class',
    'classname' => 'JsonException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\JsonException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\DecodingExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\RedirectionException' => 
  array (
    'type' => 'class',
    'classname' => 'RedirectionException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\RedirectionException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\RedirectionExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\ServerException' => 
  array (
    'type' => 'class',
    'classname' => 'ServerException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\ServerException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\ServerExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\TimeoutException' => 
  array (
    'type' => 'class',
    'classname' => 'TimeoutException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\TimeoutException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\TimeoutExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\TransportException' => 
  array (
    'type' => 'class',
    'classname' => 'TransportException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\TransportException',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\Exception\\TransportExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\HttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'HttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\HttpClient',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\HttpOptions' => 
  array (
    'type' => 'class',
    'classname' => 'HttpOptions',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\HttpOptions',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\HttplugClient' => 
  array (
    'type' => 'class',
    'classname' => 'HttplugClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\HttplugClient',
    'implements' => 
    array (
      0 => 'Http\\Client\\HttpClient',
      1 => 'Http\\Client\\HttpAsyncClient',
      2 => 'Http\\Message\\RequestFactory',
      3 => 'Http\\Message\\StreamFactory',
      4 => 'Http\\Message\\UriFactory',
      5 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\AmpBody' => 
  array (
    'type' => 'class',
    'classname' => 'AmpBody',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\AmpBody',
    'implements' => 
    array (
      0 => 'Amp\\Http\\Client\\RequestBody',
      1 => 'Amp\\ByteStream\\InputStream',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\AmpClientState' => 
  array (
    'type' => 'class',
    'classname' => 'AmpClientState',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\AmpClientState',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\AmpListener' => 
  array (
    'type' => 'class',
    'classname' => 'AmpListener',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\AmpListener',
    'implements' => 
    array (
      0 => 'Amp\\Http\\Client\\EventListener',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\AmpResolver' => 
  array (
    'type' => 'class',
    'classname' => 'AmpResolver',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\AmpResolver',
    'implements' => 
    array (
      0 => 'Amp\\Dns\\Resolver',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\Canary' => 
  array (
    'type' => 'class',
    'classname' => 'Canary',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\Canary',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\ClientState' => 
  array (
    'type' => 'class',
    'classname' => 'ClientState',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\ClientState',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\CurlClientState' => 
  array (
    'type' => 'class',
    'classname' => 'CurlClientState',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\CurlClientState',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\DnsCache' => 
  array (
    'type' => 'class',
    'classname' => 'DnsCache',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\DnsCache',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\HttplugWaitLoop' => 
  array (
    'type' => 'class',
    'classname' => 'HttplugWaitLoop',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\HttplugWaitLoop',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\NativeClientState' => 
  array (
    'type' => 'class',
    'classname' => 'NativeClientState',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\NativeClientState',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Internal\\PushedResponse' => 
  array (
    'type' => 'class',
    'classname' => 'PushedResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Internal',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Internal\\PushedResponse',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\MockHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'MockHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\MockHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\NativeHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'NativeHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\NativeHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Psr\\Log\\LoggerAwareInterface',
      2 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\NoPrivateNetworkHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'NoPrivateNetworkHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\NoPrivateNetworkHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Psr\\Log\\LoggerAwareInterface',
      2 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Psr18Client' => 
  array (
    'type' => 'class',
    'classname' => 'Psr18Client',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Psr18Client',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Client\\ClientInterface',
      1 => 'Psr\\Http\\Message\\RequestFactoryInterface',
      2 => 'Psr\\Http\\Message\\StreamFactoryInterface',
      3 => 'Psr\\Http\\Message\\UriFactoryInterface',
      4 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Psr18NetworkException' => 
  array (
    'type' => 'class',
    'classname' => 'Psr18NetworkException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Psr18NetworkException',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Client\\NetworkExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Psr18RequestException' => 
  array (
    'type' => 'class',
    'classname' => 'Psr18RequestException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Psr18RequestException',
    'implements' => 
    array (
      0 => 'Psr\\Http\\Client\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\AmpResponse' => 
  array (
    'type' => 'class',
    'classname' => 'AmpResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\AmpResponse',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseInterface',
      1 => 'Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\AsyncContext' => 
  array (
    'type' => 'class',
    'classname' => 'AsyncContext',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\AsyncContext',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\AsyncResponse' => 
  array (
    'type' => 'class',
    'classname' => 'AsyncResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\AsyncResponse',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseInterface',
      1 => 'Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\CurlResponse' => 
  array (
    'type' => 'class',
    'classname' => 'CurlResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\CurlResponse',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseInterface',
      1 => 'Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\HttplugPromise' => 
  array (
    'type' => 'class',
    'classname' => 'HttplugPromise',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\HttplugPromise',
    'implements' => 
    array (
      0 => 'Http\\Promise\\Promise',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\MockResponse' => 
  array (
    'type' => 'class',
    'classname' => 'MockResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\MockResponse',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseInterface',
      1 => 'Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\NativeResponse' => 
  array (
    'type' => 'class',
    'classname' => 'NativeResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\NativeResponse',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseInterface',
      1 => 'Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\ResponseStream' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseStream',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\ResponseStream',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseStreamInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\StreamWrapper' => 
  array (
    'type' => 'class',
    'classname' => 'StreamWrapper',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\StreamWrapper',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\TraceableResponse' => 
  array (
    'type' => 'class',
    'classname' => 'TraceableResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\TraceableResponse',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\ResponseInterface',
      1 => 'Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Retry\\GenericRetryStrategy' => 
  array (
    'type' => 'class',
    'classname' => 'GenericRetryStrategy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient\\Retry',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Retry\\GenericRetryStrategy',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpClient\\Retry\\RetryStrategyInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\RetryableHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'RetryableHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\RetryableHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\ScopingHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'ScopingHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\ScopingHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Symfony\\Contracts\\Service\\ResetInterface',
      2 => 'Psr\\Log\\LoggerAwareInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\TraceableHttpClient' => 
  array (
    'type' => 'class',
    'classname' => 'TraceableHttpClient',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpClient',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\TraceableHttpClient',
    'implements' => 
    array (
      0 => 'Symfony\\Contracts\\HttpClient\\HttpClientInterface',
      1 => 'Symfony\\Contracts\\Service\\ResetInterface',
      2 => 'Psr\\Log\\LoggerAwareInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\AcceptHeader' => 
  array (
    'type' => 'class',
    'classname' => 'AcceptHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\AcceptHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\AcceptHeaderItem' => 
  array (
    'type' => 'class',
    'classname' => 'AcceptHeaderItem',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\AcceptHeaderItem',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\BinaryFileResponse' => 
  array (
    'type' => 'class',
    'classname' => 'BinaryFileResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\BinaryFileResponse',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Cookie' => 
  array (
    'type' => 'class',
    'classname' => 'Cookie',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Cookie',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Exception\\BadRequestException' => 
  array (
    'type' => 'class',
    'classname' => 'BadRequestException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Exception\\BadRequestException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Exception\\ConflictingHeadersException' => 
  array (
    'type' => 'class',
    'classname' => 'ConflictingHeadersException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Exception\\ConflictingHeadersException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Exception\\JsonException' => 
  array (
    'type' => 'class',
    'classname' => 'JsonException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Exception\\JsonException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Exception\\SessionNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'SessionNotFoundException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Exception\\SessionNotFoundException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Exception\\SuspiciousOperationException' => 
  array (
    'type' => 'class',
    'classname' => 'SuspiciousOperationException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Exception\\SuspiciousOperationException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\ExpressionRequestMatcher' => 
  array (
    'type' => 'class',
    'classname' => 'ExpressionRequestMatcher',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\ExpressionRequestMatcher',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\AccessDeniedException' => 
  array (
    'type' => 'class',
    'classname' => 'AccessDeniedException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\AccessDeniedException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\CannotWriteFileException' => 
  array (
    'type' => 'class',
    'classname' => 'CannotWriteFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\CannotWriteFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\ExtensionFileException' => 
  array (
    'type' => 'class',
    'classname' => 'ExtensionFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\ExtensionFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileException' => 
  array (
    'type' => 'class',
    'classname' => 'FileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\FileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileNotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'FileNotFoundException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\FileNotFoundException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\FormSizeFileException' => 
  array (
    'type' => 'class',
    'classname' => 'FormSizeFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\FormSizeFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\IniSizeFileException' => 
  array (
    'type' => 'class',
    'classname' => 'IniSizeFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\IniSizeFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\NoFileException' => 
  array (
    'type' => 'class',
    'classname' => 'NoFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\NoFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\NoTmpDirFileException' => 
  array (
    'type' => 'class',
    'classname' => 'NoTmpDirFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\NoTmpDirFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\PartialFileException' => 
  array (
    'type' => 'class',
    'classname' => 'PartialFileException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\PartialFileException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\UnexpectedTypeException' => 
  array (
    'type' => 'class',
    'classname' => 'UnexpectedTypeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\UnexpectedTypeException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Exception\\UploadException' => 
  array (
    'type' => 'class',
    'classname' => 'UploadException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Exception\\UploadException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\File' => 
  array (
    'type' => 'class',
    'classname' => 'File',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\File',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\Stream' => 
  array (
    'type' => 'class',
    'classname' => 'Stream',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\Stream',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\File\\UploadedFile' => 
  array (
    'type' => 'class',
    'classname' => 'UploadedFile',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\File',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\File\\UploadedFile',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\FileBag' => 
  array (
    'type' => 'class',
    'classname' => 'FileBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\FileBag',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\HeaderBag' => 
  array (
    'type' => 'class',
    'classname' => 'HeaderBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\HeaderBag',
    'implements' => 
    array (
      0 => 'IteratorAggregate',
      1 => 'Countable',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\HeaderUtils' => 
  array (
    'type' => 'class',
    'classname' => 'HeaderUtils',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\HeaderUtils',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\InputBag' => 
  array (
    'type' => 'class',
    'classname' => 'InputBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\InputBag',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\IpUtils' => 
  array (
    'type' => 'class',
    'classname' => 'IpUtils',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\IpUtils',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\JsonResponse' => 
  array (
    'type' => 'class',
    'classname' => 'JsonResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\JsonResponse',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\ParameterBag' => 
  array (
    'type' => 'class',
    'classname' => 'ParameterBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\ParameterBag',
    'implements' => 
    array (
      0 => 'IteratorAggregate',
      1 => 'Countable',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\RateLimiter\\AbstractRequestRateLimiter' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractRequestRateLimiter',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\RateLimiter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\RateLimiter\\AbstractRequestRateLimiter',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\RateLimiter\\RequestRateLimiterInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\RedirectResponse' => 
  array (
    'type' => 'class',
    'classname' => 'RedirectResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\RedirectResponse',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Request' => 
  array (
    'type' => 'class',
    'classname' => 'Request',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Request',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\RequestMatcher' => 
  array (
    'type' => 'class',
    'classname' => 'RequestMatcher',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\RequestMatcher',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\RequestMatcherInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\RequestStack' => 
  array (
    'type' => 'class',
    'classname' => 'RequestStack',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\RequestStack',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Response' => 
  array (
    'type' => 'class',
    'classname' => 'Response',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Response',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\ResponseHeaderBag' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseHeaderBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\ResponseHeaderBag',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\ServerBag' => 
  array (
    'type' => 'class',
    'classname' => 'ServerBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\ServerBag',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag' => 
  array (
    'type' => 'class',
    'classname' => 'AttributeBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBagInterface',
      1 => 'IteratorAggregate',
      2 => 'Countable',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\NamespacedAttributeBag' => 
  array (
    'type' => 'class',
    'classname' => 'NamespacedAttributeBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Attribute\\NamespacedAttributeBag',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Flash\\AutoExpireFlashBag' => 
  array (
    'type' => 'class',
    'classname' => 'AutoExpireFlashBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Flash',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Flash\\AutoExpireFlashBag',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag' => 
  array (
    'type' => 'class',
    'classname' => 'FlashBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Flash',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Session' => 
  array (
    'type' => 'class',
    'classname' => 'Session',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Session',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\SessionInterface',
      1 => 'IteratorAggregate',
      2 => 'Countable',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\SessionBagProxy' => 
  array (
    'type' => 'class',
    'classname' => 'SessionBagProxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\SessionBagProxy',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\SessionBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\SessionFactory' => 
  array (
    'type' => 'class',
    'classname' => 'SessionFactory',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\SessionFactory',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\SessionFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\SessionUtils' => 
  array (
    'type' => 'class',
    'classname' => 'SessionUtils',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\SessionUtils',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\AbstractSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractSessionHandler',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\AbstractSessionHandler',
    'implements' => 
    array (
      0 => 'SessionHandlerInterface',
      1 => 'SessionUpdateTimestampHandlerInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\IdentityMarshaller' => 
  array (
    'type' => 'class',
    'classname' => 'IdentityMarshaller',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\IdentityMarshaller',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Cache\\Marshaller\\MarshallerInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MarshallingSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MarshallingSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MarshallingSessionHandler',
    'implements' => 
    array (
      0 => 'SessionHandlerInterface',
      1 => 'SessionUpdateTimestampHandlerInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MemcachedSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MemcachedSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MemcachedSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MigratingSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MigratingSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MigratingSessionHandler',
    'implements' => 
    array (
      0 => 'SessionHandlerInterface',
      1 => 'SessionUpdateTimestampHandlerInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MongoDbSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'MongoDbSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MongoDbSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NativeFileSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NullSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'NullSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NullSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\PdoSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'PdoSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\PdoSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\RedisSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'RedisSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\RedisSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\SessionHandlerFactory' => 
  array (
    'type' => 'class',
    'classname' => 'SessionHandlerFactory',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\SessionHandlerFactory',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\StrictSessionHandler' => 
  array (
    'type' => 'class',
    'classname' => 'StrictSessionHandler',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\StrictSessionHandler',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MetadataBag' => 
  array (
    'type' => 'class',
    'classname' => 'MetadataBag',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\MetadataBag',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\SessionBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockArraySessionStorage' => 
  array (
    'type' => 'class',
    'classname' => 'MockArraySessionStorage',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockArraySessionStorage',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage' => 
  array (
    'type' => 'class',
    'classname' => 'MockFileSessionStorage',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorageFactory' => 
  array (
    'type' => 'class',
    'classname' => 'MockFileSessionStorageFactory',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorageFactory',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage' => 
  array (
    'type' => 'class',
    'classname' => 'NativeSessionStorage',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorageFactory' => 
  array (
    'type' => 'class',
    'classname' => 'NativeSessionStorageFactory',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorageFactory',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage' => 
  array (
    'type' => 'class',
    'classname' => 'PhpBridgeSessionStorage',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorageFactory' => 
  array (
    'type' => 'class',
    'classname' => 'PhpBridgeSessionStorageFactory',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorageFactory',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\AbstractProxy' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractProxy',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\AbstractProxy',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\SessionHandlerProxy' => 
  array (
    'type' => 'class',
    'classname' => 'SessionHandlerProxy',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\SessionHandlerProxy',
    'implements' => 
    array (
      0 => 'SessionHandlerInterface',
      1 => 'SessionUpdateTimestampHandlerInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\ServiceSessionFactory' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceSessionFactory',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\ServiceSessionFactory',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\StreamedResponse' => 
  array (
    'type' => 'class',
    'classname' => 'StreamedResponse',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\StreamedResponse',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\RequestAttributeValueSame' => 
  array (
    'type' => 'class',
    'classname' => 'RequestAttributeValueSame',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\RequestAttributeValueSame',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseCookieValueSame' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseCookieValueSame',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseCookieValueSame',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseFormatSame' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseFormatSame',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseFormatSame',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseHasCookie' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseHasCookie',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseHasCookie',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseHasHeader' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseHasHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseHasHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseHeaderSame' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseHeaderSame',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseHeaderSame',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseIsRedirected' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseIsRedirected',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseIsRedirected',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseIsSuccessful' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseIsSuccessful',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseIsSuccessful',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseIsUnprocessable' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseIsUnprocessable',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseIsUnprocessable',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseStatusCodeSame' => 
  array (
    'type' => 'class',
    'classname' => 'ResponseStatusCodeSame',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Test\\Constraint\\ResponseStatusCodeSame',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\UrlHelper' => 
  array (
    'type' => 'class',
    'classname' => 'UrlHelper',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\UrlHelper',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Address',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\CharacterStream' => 
  array (
    'type' => 'class',
    'classname' => 'CharacterStream',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\CharacterStream',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Crypto\\DkimOptions' => 
  array (
    'type' => 'class',
    'classname' => 'DkimOptions',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Crypto',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Crypto\\DkimOptions',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Crypto\\DkimSigner' => 
  array (
    'type' => 'class',
    'classname' => 'DkimSigner',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Crypto',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Crypto\\DkimSigner',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Crypto\\SMime' => 
  array (
    'type' => 'class',
    'classname' => 'SMime',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Mime\\Crypto',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Crypto\\SMime',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Crypto\\SMimeEncrypter' => 
  array (
    'type' => 'class',
    'classname' => 'SMimeEncrypter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Crypto',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Crypto\\SMimeEncrypter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Crypto\\SMimeSigner' => 
  array (
    'type' => 'class',
    'classname' => 'SMimeSigner',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Crypto',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Crypto\\SMimeSigner',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\DependencyInjection\\AddMimeTypeGuesserPass' => 
  array (
    'type' => 'class',
    'classname' => 'AddMimeTypeGuesserPass',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\DependencyInjection',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\DependencyInjection\\AddMimeTypeGuesserPass',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\DependencyInjection\\Compiler\\CompilerPassInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Email' => 
  array (
    'type' => 'class',
    'classname' => 'Email',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Email',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\Base64ContentEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'Base64ContentEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\Base64ContentEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\ContentEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\Base64Encoder' => 
  array (
    'type' => 'class',
    'classname' => 'Base64Encoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\Base64Encoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\EncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\Base64MimeHeaderEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'Base64MimeHeaderEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\Base64MimeHeaderEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\MimeHeaderEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\EightBitContentEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'EightBitContentEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\EightBitContentEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\ContentEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\IdnAddressEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'IdnAddressEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\IdnAddressEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\AddressEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\QpContentEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'QpContentEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\QpContentEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\ContentEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\QpEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'QpEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\QpEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\EncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\QpMimeHeaderEncoder' => 
  array (
    'type' => 'class',
    'classname' => 'QpMimeHeaderEncoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\QpMimeHeaderEncoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\MimeHeaderEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\Rfc2231Encoder' => 
  array (
    'type' => 'class',
    'classname' => 'Rfc2231Encoder',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\Rfc2231Encoder',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Encoder\\EncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Exception\\AddressEncoderException' => 
  array (
    'type' => 'class',
    'classname' => 'AddressEncoderException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Exception\\AddressEncoderException',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Exception\\LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'LogicException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Exception\\LogicException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Exception\\RfcComplianceException' => 
  array (
    'type' => 'class',
    'classname' => 'RfcComplianceException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Exception\\RfcComplianceException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\FileBinaryMimeTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'FileBinaryMimeTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\FileBinaryMimeTypeGuesser',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\MimeTypeGuesserInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\FileinfoMimeTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'FileinfoMimeTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\FileinfoMimeTypeGuesser',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\MimeTypeGuesserInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\AbstractHeader' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractHeader',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\AbstractHeader',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\Header\\HeaderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\DateHeader' => 
  array (
    'type' => 'class',
    'classname' => 'DateHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\DateHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\Headers' => 
  array (
    'type' => 'class',
    'classname' => 'Headers',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\Headers',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\IdentificationHeader' => 
  array (
    'type' => 'class',
    'classname' => 'IdentificationHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\IdentificationHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\MailboxHeader' => 
  array (
    'type' => 'class',
    'classname' => 'MailboxHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\MailboxHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\MailboxListHeader' => 
  array (
    'type' => 'class',
    'classname' => 'MailboxListHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\MailboxListHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\ParameterizedHeader' => 
  array (
    'type' => 'class',
    'classname' => 'ParameterizedHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\ParameterizedHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\PathHeader' => 
  array (
    'type' => 'class',
    'classname' => 'PathHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\PathHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\UnstructuredHeader' => 
  array (
    'type' => 'class',
    'classname' => 'UnstructuredHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\UnstructuredHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Message' => 
  array (
    'type' => 'class',
    'classname' => 'Message',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Message',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\MessageConverter' => 
  array (
    'type' => 'class',
    'classname' => 'MessageConverter',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\MessageConverter',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\MimeTypes' => 
  array (
    'type' => 'class',
    'classname' => 'MimeTypes',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\MimeTypes',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\Mime\\MimeTypesInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\AbstractMultipartPart' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractMultipartPart',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Mime\\Part',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\AbstractMultipartPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\AbstractPart' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractPart',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\Mime\\Part',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\AbstractPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\DataPart' => 
  array (
    'type' => 'class',
    'classname' => 'DataPart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\DataPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\MessagePart' => 
  array (
    'type' => 'class',
    'classname' => 'MessagePart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\MessagePart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\Multipart\\AlternativePart' => 
  array (
    'type' => 'class',
    'classname' => 'AlternativePart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part\\Multipart',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\Multipart\\AlternativePart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\Multipart\\DigestPart' => 
  array (
    'type' => 'class',
    'classname' => 'DigestPart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part\\Multipart',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\Multipart\\DigestPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\Multipart\\FormDataPart' => 
  array (
    'type' => 'class',
    'classname' => 'FormDataPart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part\\Multipart',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\Multipart\\FormDataPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\Multipart\\MixedPart' => 
  array (
    'type' => 'class',
    'classname' => 'MixedPart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part\\Multipart',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\Multipart\\MixedPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\Multipart\\RelatedPart' => 
  array (
    'type' => 'class',
    'classname' => 'RelatedPart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part\\Multipart',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\Multipart\\RelatedPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\SMimePart' => 
  array (
    'type' => 'class',
    'classname' => 'SMimePart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\SMimePart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Part\\TextPart' => 
  array (
    'type' => 'class',
    'classname' => 'TextPart',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Part',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Part\\TextPart',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\RawMessage' => 
  array (
    'type' => 'class',
    'classname' => 'RawMessage',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\RawMessage',
    'implements' => 
    array (
      0 => 'Serializable',
    ),
  ),
  'Symfony\\Component\\Mime\\Test\\Constraint\\EmailAddressContains' => 
  array (
    'type' => 'class',
    'classname' => 'EmailAddressContains',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Test\\Constraint\\EmailAddressContains',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Test\\Constraint\\EmailAttachmentCount' => 
  array (
    'type' => 'class',
    'classname' => 'EmailAttachmentCount',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Test\\Constraint\\EmailAttachmentCount',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Test\\Constraint\\EmailHasHeader' => 
  array (
    'type' => 'class',
    'classname' => 'EmailHasHeader',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Test\\Constraint\\EmailHasHeader',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Test\\Constraint\\EmailHeaderSame' => 
  array (
    'type' => 'class',
    'classname' => 'EmailHeaderSame',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Test\\Constraint\\EmailHeaderSame',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Test\\Constraint\\EmailHtmlBodyContains' => 
  array (
    'type' => 'class',
    'classname' => 'EmailHtmlBodyContains',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Test\\Constraint\\EmailHtmlBodyContains',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\Mime\\Test\\Constraint\\EmailTextBodyContains' => 
  array (
    'type' => 'class',
    'classname' => 'EmailTextBodyContains',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\Mime\\Test\\Constraint',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Test\\Constraint\\EmailTextBodyContains',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Attribute\\Required' => 
  array (
    'type' => 'class',
    'classname' => 'Required',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Service\\Attribute',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\Attribute\\Required',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Attribute\\SubscribedService' => 
  array (
    'type' => 'class',
    'classname' => 'SubscribedService',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Service\\Attribute',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\Attribute\\SubscribedService',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Test\\ServiceLocatorTest' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceLocatorTest',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Service\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\Test\\ServiceLocatorTest',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Service\\Test\\ServiceLocatorTestCase' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceLocatorTestCase',
    'isabstract' => true,
    'namespace' => 'Symfony\\Contracts\\Service\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\Test\\ServiceLocatorTestCase',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\String\\AbstractString' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractString',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\String',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\AbstractString',
    'implements' => 
    array (
      0 => 'Stringable',
      1 => 'JsonSerializable',
    ),
  ),
  'Symfony\\Component\\String\\AbstractUnicodeString' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractUnicodeString',
    'isabstract' => true,
    'namespace' => 'Symfony\\Component\\String',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\AbstractUnicodeString',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\String\\ByteString' => 
  array (
    'type' => 'class',
    'classname' => 'ByteString',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\ByteString',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\String\\CodePointString' => 
  array (
    'type' => 'class',
    'classname' => 'CodePointString',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\CodePointString',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Component\\String\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\String\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\String\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\String\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\String\\Inflector\\EnglishInflector' => 
  array (
    'type' => 'class',
    'classname' => 'EnglishInflector',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String\\Inflector',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Inflector\\EnglishInflector',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\String\\Inflector\\InflectorInterface',
    ),
  ),
  'Symfony\\Component\\String\\Inflector\\FrenchInflector' => 
  array (
    'type' => 'class',
    'classname' => 'FrenchInflector',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String\\Inflector',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Inflector\\FrenchInflector',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\String\\Inflector\\InflectorInterface',
    ),
  ),
  'Symfony\\Component\\String\\LazyString' => 
  array (
    'type' => 'class',
    'classname' => 'LazyString',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\LazyString',
    'implements' => 
    array (
      0 => 'Stringable',
      1 => 'JsonSerializable',
    ),
  ),
  'Symfony\\Component\\String\\Slugger\\AsciiSlugger' => 
  array (
    'type' => 'class',
    'classname' => 'AsciiSlugger',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String\\Slugger',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Slugger\\AsciiSlugger',
    'implements' => 
    array (
      0 => 'Symfony\\Component\\String\\Slugger\\SluggerInterface',
      1 => 'Symfony\\Contracts\\Translation\\LocaleAwareInterface',
    ),
  ),
  'Symfony\\Component\\String\\UnicodeString' => 
  array (
    'type' => 'class',
    'classname' => 'UnicodeString',
    'isabstract' => false,
    'namespace' => 'Symfony\\Component\\String',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\UnicodeString',
    'implements' => 
    array (
    ),
  ),
  'Symfony\\Contracts\\Translation\\Test\\TranslatorTest' => 
  array (
    'type' => 'class',
    'classname' => 'TranslatorTest',
    'isabstract' => false,
    'namespace' => 'Symfony\\Contracts\\Translation\\Test',
    'extends' => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Translation\\Test\\TranslatorTest',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Dotenv' => 
  array (
    'type' => 'class',
    'classname' => 'Dotenv',
    'isabstract' => false,
    'namespace' => 'Dotenv',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Dotenv',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Exception\\InvalidEncodingException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidEncodingException',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Exception\\InvalidEncodingException',
    'implements' => 
    array (
      0 => 'Dotenv\\Exception\\ExceptionInterface',
    ),
  ),
  'Dotenv\\Exception\\InvalidFileException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidFileException',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Exception\\InvalidFileException',
    'implements' => 
    array (
      0 => 'Dotenv\\Exception\\ExceptionInterface',
    ),
  ),
  'Dotenv\\Exception\\InvalidPathException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidPathException',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Exception\\InvalidPathException',
    'implements' => 
    array (
      0 => 'Dotenv\\Exception\\ExceptionInterface',
    ),
  ),
  'Dotenv\\Exception\\ValidationException' => 
  array (
    'type' => 'class',
    'classname' => 'ValidationException',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Exception',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Exception\\ValidationException',
    'implements' => 
    array (
      0 => 'Dotenv\\Exception\\ExceptionInterface',
    ),
  ),
  'Dotenv\\Loader\\Loader' => 
  array (
    'type' => 'class',
    'classname' => 'Loader',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Loader',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Loader\\Loader',
    'implements' => 
    array (
      0 => 'Dotenv\\Loader\\LoaderInterface',
    ),
  ),
  'Dotenv\\Loader\\Resolver' => 
  array (
    'type' => 'class',
    'classname' => 'Resolver',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Loader',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Loader\\Resolver',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Parser\\Entry' => 
  array (
    'type' => 'class',
    'classname' => 'Entry',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Parser',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\Entry',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Parser\\EntryParser' => 
  array (
    'type' => 'class',
    'classname' => 'EntryParser',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Parser',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\EntryParser',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Parser\\Lexer' => 
  array (
    'type' => 'class',
    'classname' => 'Lexer',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Parser',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\Lexer',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Parser\\Lines' => 
  array (
    'type' => 'class',
    'classname' => 'Lines',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Parser',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\Lines',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Parser\\Parser' => 
  array (
    'type' => 'class',
    'classname' => 'Parser',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Parser',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\Parser',
    'implements' => 
    array (
      0 => 'Dotenv\\Parser\\ParserInterface',
    ),
  ),
  'Dotenv\\Parser\\Value' => 
  array (
    'type' => 'class',
    'classname' => 'Value',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Parser',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\Value',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Repository\\Adapter\\ApacheAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ApacheAdapter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\ApacheAdapter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\AdapterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\ArrayAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ArrayAdapter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\ArrayAdapter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\AdapterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\EnvConstAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'EnvConstAdapter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\EnvConstAdapter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\AdapterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\GuardedWriter' => 
  array (
    'type' => 'class',
    'classname' => 'GuardedWriter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\GuardedWriter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\WriterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\ImmutableWriter' => 
  array (
    'type' => 'class',
    'classname' => 'ImmutableWriter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\ImmutableWriter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\WriterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\MultiReader' => 
  array (
    'type' => 'class',
    'classname' => 'MultiReader',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\MultiReader',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\ReaderInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\MultiWriter' => 
  array (
    'type' => 'class',
    'classname' => 'MultiWriter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\MultiWriter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\WriterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\PutenvAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'PutenvAdapter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\PutenvAdapter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\AdapterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\ReplacingWriter' => 
  array (
    'type' => 'class',
    'classname' => 'ReplacingWriter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\ReplacingWriter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\WriterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\ServerConstAdapter' => 
  array (
    'type' => 'class',
    'classname' => 'ServerConstAdapter',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\ServerConstAdapter',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\Adapter\\AdapterInterface',
    ),
  ),
  'Dotenv\\Repository\\AdapterRepository' => 
  array (
    'type' => 'class',
    'classname' => 'AdapterRepository',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\AdapterRepository',
    'implements' => 
    array (
      0 => 'Dotenv\\Repository\\RepositoryInterface',
    ),
  ),
  'Dotenv\\Repository\\RepositoryBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'RepositoryBuilder',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Repository',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\RepositoryBuilder',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Store\\File\\Paths' => 
  array (
    'type' => 'class',
    'classname' => 'Paths',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Store\\File',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Store\\File\\Paths',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Store\\File\\Reader' => 
  array (
    'type' => 'class',
    'classname' => 'Reader',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Store\\File',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Store\\File\\Reader',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Store\\FileStore' => 
  array (
    'type' => 'class',
    'classname' => 'FileStore',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Store',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Store\\FileStore',
    'implements' => 
    array (
      0 => 'Dotenv\\Store\\StoreInterface',
    ),
  ),
  'Dotenv\\Store\\StoreBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'StoreBuilder',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Store',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Store\\StoreBuilder',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Store\\StringStore' => 
  array (
    'type' => 'class',
    'classname' => 'StringStore',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Store',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Store\\StringStore',
    'implements' => 
    array (
      0 => 'Dotenv\\Store\\StoreInterface',
    ),
  ),
  'Dotenv\\Util\\Regex' => 
  array (
    'type' => 'class',
    'classname' => 'Regex',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Util',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Util\\Regex',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Util\\Str' => 
  array (
    'type' => 'class',
    'classname' => 'Str',
    'isabstract' => false,
    'namespace' => 'Dotenv\\Util',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Util\\Str',
    'implements' => 
    array (
    ),
  ),
  'Dotenv\\Validator' => 
  array (
    'type' => 'class',
    'classname' => 'Validator',
    'isabstract' => false,
    'namespace' => 'Dotenv',
    'extends' => 'KadenceWP\\KadenceBlocks\\Dotenv\\Validator',
    'implements' => 
    array (
    ),
  ),
  'Monolog\\Handler\\FormattableHandlerTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'FormattableHandlerTrait',
    'namespace' => 'Monolog\\Handler',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FormattableHandlerTrait',
    ),
  ),
  'Monolog\\Handler\\ProcessableHandlerTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ProcessableHandlerTrait',
    'namespace' => 'Monolog\\Handler',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ProcessableHandlerTrait',
    ),
  ),
  'Monolog\\Handler\\WebRequestRecognizerTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'WebRequestRecognizerTrait',
    'namespace' => 'Monolog\\Handler',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\WebRequestRecognizerTrait',
    ),
  ),
  'Nyholm\\Psr7\\MessageTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'MessageTrait',
    'namespace' => 'Nyholm\\Psr7',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\MessageTrait',
    ),
  ),
  'Nyholm\\Psr7\\RequestTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'RequestTrait',
    'namespace' => 'Nyholm\\Psr7',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\RequestTrait',
    ),
  ),
  'Nyholm\\Psr7\\StreamTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'StreamTrait',
    'namespace' => 'Nyholm\\Psr7',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Nyholm\\Psr7\\StreamTrait',
    ),
  ),
  'Psr\\Log\\LoggerAwareTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LoggerAwareTrait',
    'namespace' => 'Psr\\Log',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\LoggerAwareTrait',
    ),
  ),
  'Psr\\Log\\LoggerTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'LoggerTrait',
    'namespace' => 'Psr\\Log',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\LoggerTrait',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\Aggregate' => 
  array (
    'type' => 'trait',
    'traitname' => 'Aggregate',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\Aggregate',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\CRUD' => 
  array (
    'type' => 'trait',
    'traitname' => 'CRUD',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\CRUD',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\FromClause' => 
  array (
    'type' => 'trait',
    'traitname' => 'FromClause',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\FromClause',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\GroupByStatement' => 
  array (
    'type' => 'trait',
    'traitname' => 'GroupByStatement',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\GroupByStatement',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\HavingClause' => 
  array (
    'type' => 'trait',
    'traitname' => 'HavingClause',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\HavingClause',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\JoinClause' => 
  array (
    'type' => 'trait',
    'traitname' => 'JoinClause',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\JoinClause',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\LimitStatement' => 
  array (
    'type' => 'trait',
    'traitname' => 'LimitStatement',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\LimitStatement',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\MetaQuery' => 
  array (
    'type' => 'trait',
    'traitname' => 'MetaQuery',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\MetaQuery',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\OffsetStatement' => 
  array (
    'type' => 'trait',
    'traitname' => 'OffsetStatement',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\OffsetStatement',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\OrderByStatement' => 
  array (
    'type' => 'trait',
    'traitname' => 'OrderByStatement',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\OrderByStatement',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\SelectStatement' => 
  array (
    'type' => 'trait',
    'traitname' => 'SelectStatement',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\SelectStatement',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\TablePrefix' => 
  array (
    'type' => 'trait',
    'traitname' => 'TablePrefix',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\TablePrefix',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\UnionOperator' => 
  array (
    'type' => 'trait',
    'traitname' => 'UnionOperator',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\UnionOperator',
    ),
  ),
  'StellarWP\\DB\\QueryBuilder\\Concerns\\WhereClause' => 
  array (
    'type' => 'trait',
    'traitname' => 'WhereClause',
    'namespace' => 'StellarWP\\DB\\QueryBuilder\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\DB\\QueryBuilder\\Concerns\\WhereClause',
    ),
  ),
  'LiquidWeb\\Harbor\\Traits\\With_Debugging' => 
  array (
    'type' => 'trait',
    'traitname' => 'With_Debugging',
    'namespace' => 'LiquidWeb\\Harbor\\Traits',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Traits\\With_Debugging',
    ),
  ),
  'LiquidWeb\\Harbor\\Traits\\With_Error_Throttle' => 
  array (
    'type' => 'trait',
    'traitname' => 'With_Error_Throttle',
    'namespace' => 'LiquidWeb\\Harbor\\Traits',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Traits\\With_Error_Throttle',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Concerns\\InteractsWithDateTime' => 
  array (
    'type' => 'trait',
    'traitname' => 'InteractsWithDateTime',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Concerns\\InteractsWithDateTime',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Concerns\\RebindsAuthState' => 
  array (
    'type' => 'trait',
    'traitname' => 'RebindsAuthState',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Concerns\\RebindsAuthState',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Concerns\\RebindsRequestHeaderCollection' => 
  array (
    'type' => 'trait',
    'traitname' => 'RebindsRequestHeaderCollection',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Concerns',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Concerns\\RebindsRequestHeaderCollection',
    ),
  ),
  'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Traits\\Multisite_Trait' => 
  array (
    'type' => 'trait',
    'traitname' => 'Multisite_Trait',
    'namespace' => 'StellarWP\\Uplink\\Auth\\License\\Pipeline\\Traits',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\License\\Pipeline\\Traits\\Multisite_Trait',
    ),
  ),
  'StellarWP\\Uplink\\Traits\\With_Debugging' => 
  array (
    'type' => 'trait',
    'traitname' => 'With_Debugging',
    'namespace' => 'StellarWP\\Uplink\\Traits',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Traits\\With_Debugging',
    ),
  ),
  'Symfony\\Component\\HttpClient\\AsyncDecoratorTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'AsyncDecoratorTrait',
    'namespace' => 'Symfony\\Component\\HttpClient',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\AsyncDecoratorTrait',
    ),
  ),
  'Symfony\\Component\\HttpClient\\DecoratorTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'DecoratorTrait',
    'namespace' => 'Symfony\\Component\\HttpClient',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\DecoratorTrait',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Exception\\HttpExceptionTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'HttpExceptionTrait',
    'namespace' => 'Symfony\\Component\\HttpClient\\Exception',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Exception\\HttpExceptionTrait',
    ),
  ),
  'Symfony\\Component\\HttpClient\\HttpClientTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'HttpClientTrait',
    'namespace' => 'Symfony\\Component\\HttpClient',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\HttpClientTrait',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\CommonResponseTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'CommonResponseTrait',
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\CommonResponseTrait',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\TransportResponseTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'TransportResponseTrait',
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\TransportResponseTrait',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceLocatorTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ServiceLocatorTrait',
    'namespace' => 'Symfony\\Contracts\\Service',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\ServiceLocatorTrait',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceSubscriberTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'ServiceSubscriberTrait',
    'namespace' => 'Symfony\\Contracts\\Service',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\ServiceSubscriberTrait',
    ),
  ),
  'Symfony\\Contracts\\Translation\\TranslatorTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'TranslatorTrait',
    'namespace' => 'Symfony\\Contracts\\Translation',
    'use' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Translation\\TranslatorTrait',
    ),
  ),
  'enshrined\\svgSanitize\\data\\AttributeInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AttributeInterface',
    'namespace' => 'enshrined\\svgSanitize\\data',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\data\\AttributeInterface',
    ),
  ),
  'enshrined\\svgSanitize\\data\\TagInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TagInterface',
    'namespace' => 'enshrined\\svgSanitize\\data',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\enshrined\\svgSanitize\\data\\TagInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\BuilderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'BuilderInterface',
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\BuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\ReinitializableBuilderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ReinitializableBuilderInterface',
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\lucatume\\DI52\\Builders\\ReinitializableBuilderInterface',
    ),
  ),
  'Monolog\\Formatter\\FormatterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FormatterInterface',
    'namespace' => 'Monolog\\Formatter',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Formatter\\FormatterInterface',
    ),
  ),
  'Monolog\\Handler\\FingersCrossed\\ActivationStrategyInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ActivationStrategyInterface',
    'namespace' => 'Monolog\\Handler\\FingersCrossed',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FingersCrossed\\ActivationStrategyInterface',
    ),
  ),
  'Monolog\\Handler\\FormattableHandlerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FormattableHandlerInterface',
    'namespace' => 'Monolog\\Handler',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\FormattableHandlerInterface',
    ),
  ),
  'Monolog\\Handler\\HandlerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'HandlerInterface',
    'namespace' => 'Monolog\\Handler',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\HandlerInterface',
    ),
  ),
  'Monolog\\Handler\\ProcessableHandlerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProcessableHandlerInterface',
    'namespace' => 'Monolog\\Handler',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Handler\\ProcessableHandlerInterface',
    ),
  ),
  'Monolog\\LogRecord' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LogRecord',
    'namespace' => 'Monolog',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\LogRecord',
    ),
  ),
  'Monolog\\Processor\\ProcessorInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProcessorInterface',
    'namespace' => 'Monolog\\Processor',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\Processor\\ProcessorInterface',
    ),
  ),
  'Monolog\\ResettableInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResettableInterface',
    'namespace' => 'Monolog',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Monolog\\ResettableInterface',
    ),
  ),
  'Psr\\Container\\ContainerExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerExceptionInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Container\\ContainerExceptionInterface',
    ),
  ),
  'Psr\\Container\\ContainerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Container\\ContainerInterface',
    ),
  ),
  'Psr\\Container\\NotFoundExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NotFoundExceptionInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Container\\NotFoundExceptionInterface',
    ),
  ),
  'Psr\\Http\\Client\\ClientExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ClientExceptionInterface',
    'namespace' => 'Psr\\Http\\Client',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Client\\ClientExceptionInterface',
    ),
  ),
  'Psr\\Http\\Client\\ClientInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ClientInterface',
    'namespace' => 'Psr\\Http\\Client',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Client\\ClientInterface',
    ),
  ),
  'Psr\\Http\\Client\\NetworkExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NetworkExceptionInterface',
    'namespace' => 'Psr\\Http\\Client',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Client\\NetworkExceptionInterface',
    ),
  ),
  'Psr\\Http\\Client\\RequestExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RequestExceptionInterface',
    'namespace' => 'Psr\\Http\\Client',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Client\\RequestExceptionInterface',
    ),
  ),
  'Psr\\Http\\Message\\RequestFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RequestFactoryInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\RequestFactoryInterface',
    ),
  ),
  'Psr\\Http\\Message\\ResponseFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResponseFactoryInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\ResponseFactoryInterface',
    ),
  ),
  'Psr\\Http\\Message\\ServerRequestFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServerRequestFactoryInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\ServerRequestFactoryInterface',
    ),
  ),
  'Psr\\Http\\Message\\StreamFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'StreamFactoryInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\StreamFactoryInterface',
    ),
  ),
  'Psr\\Http\\Message\\UploadedFileFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'UploadedFileFactoryInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\UploadedFileFactoryInterface',
    ),
  ),
  'Psr\\Http\\Message\\UriFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'UriFactoryInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\UriFactoryInterface',
    ),
  ),
  'Psr\\Http\\Message\\MessageInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MessageInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\MessageInterface',
    ),
  ),
  'Psr\\Http\\Message\\RequestInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RequestInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\RequestInterface',
    ),
  ),
  'Psr\\Http\\Message\\ResponseInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResponseInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\ResponseInterface',
    ),
  ),
  'Psr\\Http\\Message\\ServerRequestInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServerRequestInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\ServerRequestInterface',
    ),
  ),
  'Psr\\Http\\Message\\StreamInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'StreamInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\StreamInterface',
    ),
  ),
  'Psr\\Http\\Message\\UploadedFileInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'UploadedFileInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\UploadedFileInterface',
    ),
  ),
  'Psr\\Http\\Message\\UriInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'UriInterface',
    'namespace' => 'Psr\\Http\\Message',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Http\\Message\\UriInterface',
    ),
  ),
  'Psr\\Log\\LoggerAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LoggerAwareInterface',
    'namespace' => 'Psr\\Log',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\LoggerAwareInterface',
    ),
  ),
  'Psr\\Log\\LoggerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LoggerInterface',
    'namespace' => 'Psr\\Log',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Psr\\Log\\LoggerInterface',
    ),
  ),
  'StellarWP\\ContainerContract\\ContainerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerInterface',
    'namespace' => 'StellarWP\\ContainerContract',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\ContainerContract\\ContainerInterface',
    ),
  ),
  'LiquidWeb\\Harbor\\Contracts\\Provider_Interface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Provider_Interface',
    'namespace' => 'LiquidWeb\\Harbor\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Contracts\\Provider_Interface',
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Contracts\\Installable' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Installable',
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Contracts\\Installable',
    ),
  ),
  'LiquidWeb\\Harbor\\Features\\Contracts\\Strategy' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Strategy',
    'namespace' => 'LiquidWeb\\Harbor\\Features\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Features\\Contracts\\Strategy',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Clients\\Portal_Client' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Portal_Client',
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Clients',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Clients\\Portal_Client',
    ),
  ),
  'LiquidWeb\\Harbor\\Portal\\Contracts\\Download_Url_Builder' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Download_Url_Builder',
    'namespace' => 'LiquidWeb\\Harbor\\Portal\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\Portal\\Contracts\\Download_Url_Builder',
    ),
  ),
  'LiquidWeb\\Harbor\\View\\Contracts\\View' => 
  array (
    'type' => 'interface',
    'interfacename' => 'View',
    'namespace' => 'LiquidWeb\\Harbor\\View\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\Harbor\\View\\Contracts\\View',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Contracts\\LicensingClientInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LicensingClientInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Contracts\\LicensingClientInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts\\ApiErrorExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ApiErrorExceptionInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts\\ApiErrorExceptionInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts\\ResponseExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResponseExceptionInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Exceptions\\Contracts\\ResponseExceptionInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsLedgerResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CreditsLedgerResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsLedgerResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsPoolsResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CreditsPoolsResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsPoolsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsQuotasResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CreditsQuotasResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsQuotasResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CreditsResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\CreditsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\EntitlementsResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'EntitlementsResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\EntitlementsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\LicensesResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LicensesResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\LicensesResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\ProductsResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ProductsResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\ProductsResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\TokensResourceInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TokensResourceInterface',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Resources\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Resources\\Contracts\\TokensResourceInterface',
    ),
  ),
  'LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Response',
    'namespace' => 'LiquidWeb\\LicensingApiClient\\Responses\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\LiquidWeb\\LicensingApiClient\\Responses\\Contracts\\Response',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Container' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Container',
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Container\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Container',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Providable' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Providable',
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Container\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Container\\Contracts\\Providable',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Contracts\\Sanitizer' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Sanitizer',
    'namespace' => 'StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\ImageDownloader\\Sanitization\\Contracts\\Sanitizer',
    ),
  ),
  'StellarWP\\ProphecyMonorepo\\Storage\\Contracts\\Storage' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Storage',
    'namespace' => 'StellarWP\\ProphecyMonorepo\\Storage\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\ProphecyMonorepo\\Storage\\Contracts\\Storage',
    ),
  ),
  'StellarWP\\Schema\\Fields\\Contracts\\Schema_Interface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Schema_Interface',
    'namespace' => 'StellarWP\\Schema\\Fields\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Fields\\Contracts\\Schema_Interface',
    ),
  ),
  'StellarWP\\Schema\\Tables\\Contracts\\Schema_Interface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Schema_Interface',
    'namespace' => 'StellarWP\\Schema\\Tables\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Schema\\Tables\\Contracts\\Schema_Interface',
    ),
  ),
  'StellarWP\\Telemetry\\Contracts\\Data_Provider' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Data_Provider',
    'namespace' => 'StellarWP\\Telemetry\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Contracts\\Data_Provider',
    ),
  ),
  'StellarWP\\Telemetry\\Contracts\\Runnable' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Runnable',
    'namespace' => 'StellarWP\\Telemetry\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Contracts\\Runnable',
    ),
  ),
  'StellarWP\\Telemetry\\Contracts\\Subscriber_Interface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Subscriber_Interface',
    'namespace' => 'StellarWP\\Telemetry\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Contracts\\Subscriber_Interface',
    ),
  ),
  'StellarWP\\Telemetry\\Contracts\\Template_Interface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Template_Interface',
    'namespace' => 'StellarWP\\Telemetry\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Telemetry\\Contracts\\Template_Interface',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Auth_Url' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Auth_Url',
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Auth_Url',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Token_Authorizer' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Token_Authorizer',
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Auth\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Auth\\Contracts\\Token_Authorizer',
    ),
  ),
  'StellarWP\\Uplink\\API\\V3\\Contracts\\Client_V3' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Client_V3',
    'namespace' => 'StellarWP\\Uplink\\API\\V3\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\API\\V3\\Contracts\\Client_V3',
    ),
  ),
  'StellarWP\\Uplink\\Auth\\Token\\Contracts\\Token_Manager' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Token_Manager',
    'namespace' => 'StellarWP\\Uplink\\Auth\\Token\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Auth\\Token\\Contracts\\Token_Manager',
    ),
  ),
  'StellarWP\\Uplink\\Contracts\\Provider_Interface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Provider_Interface',
    'namespace' => 'StellarWP\\Uplink\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\Contracts\\Provider_Interface',
    ),
  ),
  'StellarWP\\Uplink\\View\\Contracts\\View' => 
  array (
    'type' => 'interface',
    'interfacename' => 'View',
    'namespace' => 'StellarWP\\Uplink\\View\\Contracts',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\StellarWP\\Uplink\\View\\Contracts\\View',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Filesystem\\Exception\\IOExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'IOExceptionInterface',
    'namespace' => 'Symfony\\Component\\Filesystem\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Filesystem\\Exception\\IOExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\ChunkInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ChunkInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\ChunkInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\ClientExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ClientExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\ClientExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\DecodingExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'DecodingExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\DecodingExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\HttpExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'HttpExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\HttpExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\RedirectionExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RedirectionExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\RedirectionExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\ServerExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServerExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\ServerExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\TimeoutExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TimeoutExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\TimeoutExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\Exception\\TransportExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TransportExceptionInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\Exception\\TransportExceptionInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\HttpClientInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'HttpClientInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\HttpClientInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\ResponseInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResponseInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\ResponseInterface',
    ),
  ),
  'Symfony\\Contracts\\HttpClient\\ResponseStreamInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResponseStreamInterface',
    'namespace' => 'Symfony\\Contracts\\HttpClient',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\HttpClient\\ResponseStreamInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Response\\StreamableInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'StreamableInterface',
    'namespace' => 'Symfony\\Component\\HttpClient\\Response',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Response\\StreamableInterface',
    ),
  ),
  'Symfony\\Component\\HttpClient\\Retry\\RetryStrategyInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RetryStrategyInterface',
    'namespace' => 'Symfony\\Component\\HttpClient\\Retry',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpClient\\Retry\\RetryStrategyInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RequestExceptionInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\RateLimiter\\RequestRateLimiterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RequestRateLimiterInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\RateLimiter',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\RateLimiter\\RequestRateLimiterInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\RequestMatcherInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RequestMatcherInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\RequestMatcherInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBagInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AttributeBagInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBagInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FlashBagInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Flash',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\SessionBagInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'SessionBagInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\SessionBagInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\SessionFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'SessionFactoryInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\SessionFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\SessionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'SessionInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\SessionInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageFactoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'SessionStorageFactoryInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageFactoryInterface',
    ),
  ),
  'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'SessionStorageInterface',
    'namespace' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\BodyRendererInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'BodyRendererInterface',
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\BodyRendererInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\AddressEncoderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AddressEncoderInterface',
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\AddressEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\ContentEncoderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContentEncoderInterface',
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\ContentEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\EncoderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'EncoderInterface',
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\EncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Encoder\\MimeHeaderEncoderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MimeHeaderEncoderInterface',
    'namespace' => 'Symfony\\Component\\Mime\\Encoder',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Encoder\\MimeHeaderEncoderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Component\\Mime\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\Header\\HeaderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'HeaderInterface',
    'namespace' => 'Symfony\\Component\\Mime\\Header',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\Header\\HeaderInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\MimeTypeGuesserInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MimeTypeGuesserInterface',
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\MimeTypeGuesserInterface',
    ),
  ),
  'Symfony\\Component\\Mime\\MimeTypesInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MimeTypesInterface',
    'namespace' => 'Symfony\\Component\\Mime',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\Mime\\MimeTypesInterface',
    ),
  ),
  'Stringable' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Stringable',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'Kadence_Blocks_Stringable',
    ),
  ),
  'Symfony\\Contracts\\Service\\ResetInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ResetInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\ResetInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceProviderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServiceProviderInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\ServiceProviderInterface',
    ),
  ),
  'Symfony\\Contracts\\Service\\ServiceSubscriberInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ServiceSubscriberInterface',
    'namespace' => 'Symfony\\Contracts\\Service',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Service\\ServiceSubscriberInterface',
    ),
  ),
  'Symfony\\Component\\String\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Symfony\\Component\\String\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Exception\\ExceptionInterface',
    ),
  ),
  'Symfony\\Component\\String\\Inflector\\InflectorInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'InflectorInterface',
    'namespace' => 'Symfony\\Component\\String\\Inflector',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Inflector\\InflectorInterface',
    ),
  ),
  'Symfony\\Component\\String\\Slugger\\SluggerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'SluggerInterface',
    'namespace' => 'Symfony\\Component\\String\\Slugger',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Component\\String\\Slugger\\SluggerInterface',
    ),
  ),
  'Symfony\\Contracts\\Translation\\LocaleAwareInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LocaleAwareInterface',
    'namespace' => 'Symfony\\Contracts\\Translation',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Translation\\LocaleAwareInterface',
    ),
  ),
  'Symfony\\Contracts\\Translation\\TranslatableInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TranslatableInterface',
    'namespace' => 'Symfony\\Contracts\\Translation',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Translation\\TranslatableInterface',
    ),
  ),
  'Symfony\\Contracts\\Translation\\TranslatorInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'TranslatorInterface',
    'namespace' => 'Symfony\\Contracts\\Translation',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Symfony\\Contracts\\Translation\\TranslatorInterface',
    ),
  ),
  'Dotenv\\Exception\\ExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ExceptionInterface',
    'namespace' => 'Dotenv\\Exception',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Exception\\ExceptionInterface',
    ),
  ),
  'Dotenv\\Loader\\LoaderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'LoaderInterface',
    'namespace' => 'Dotenv\\Loader',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Loader\\LoaderInterface',
    ),
  ),
  'Dotenv\\Parser\\ParserInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ParserInterface',
    'namespace' => 'Dotenv\\Parser',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Parser\\ParserInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\AdapterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AdapterInterface',
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\AdapterInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\ReaderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ReaderInterface',
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\ReaderInterface',
    ),
  ),
  'Dotenv\\Repository\\Adapter\\WriterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'WriterInterface',
    'namespace' => 'Dotenv\\Repository\\Adapter',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\Adapter\\WriterInterface',
    ),
  ),
  'Dotenv\\Repository\\RepositoryInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'RepositoryInterface',
    'namespace' => 'Dotenv\\Repository',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Repository\\RepositoryInterface',
    ),
  ),
  'Dotenv\\Store\\StoreInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'StoreInterface',
    'namespace' => 'Dotenv\\Store',
    'extends' => 
    array (
      0 => 'KadenceWP\\KadenceBlocks\\Dotenv\\Store\\StoreInterface',
    ),
  ),
);

        public function __construct()
        {
            $this->includeFilePath = __DIR__ . '/autoload_alias.php';
        }

        /**
         * @param string $class
         */
        public function autoload($class): void
        {
            if (!isset($this->autoloadAliases[$class])) {
                return;
            }
            switch ($this->autoloadAliases[$class]['type']) {
                case 'class':
                        $this->load(
                            $this->classTemplate(
                                $this->autoloadAliases[$class]
                            )
                        );
                    break;
                case 'interface':
                    $this->load(
                        $this->interfaceTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                case 'trait':
                    $this->load(
                        $this->traitTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                default:
                    // Never.
                    break;
            }
        }

        private function load(string $includeFile): void
        {
            file_put_contents($this->includeFilePath, $includeFile);
            include $this->includeFilePath;
            file_exists($this->includeFilePath) && unlink($this->includeFilePath);
        }

        /**
         * @param ClassAliasArray $class
         */
        private function classTemplate(array $class): string
        {
            $abstract = $class['isabstract'] ? 'abstract ' : '';
            $classname = $class['classname'];
            if (isset($class['namespace'])) {
                $namespace = "namespace {$class['namespace']};";
                $extends = '\\' . $class['extends'];
                $implements = empty($class['implements']) ? ''
                : ' implements \\' . implode(', \\', $class['implements']);
            } else {
                $namespace = '';
                $extends = $class['extends'];
                $implements = !empty($class['implements']) ? ''
                : ' implements ' . implode(', ', $class['implements']);
            }
            return <<<EOD
                <?php
                $namespace
                $abstract class $classname extends $extends $implements {}
                EOD;
        }

        /**
         * @param InterfaceAliasArray $interface
         */
        private function interfaceTemplate(array $interface): string
        {
            $interfacename = $interface['interfacename'];
            $namespace = isset($interface['namespace'])
            ? "namespace {$interface['namespace']};" : '';
            $extends = isset($interface['namespace'])
            ? '\\' . implode('\\ ,', $interface['extends'])
            : implode(', ', $interface['extends']);
            return <<<EOD
                <?php
                $namespace
                interface $interfacename extends $extends {}
                EOD;
        }

        /**
         * @param TraitAliasArray $trait
         */
        private function traitTemplate(array $trait): string
        {
            $traitname = $trait['traitname'];
            $namespace = isset($trait['namespace'])
            ? "namespace {$trait['namespace']};" : '';
            $uses = isset($trait['namespace'])
            ? '\\' . implode(';' . PHP_EOL . '    use \\', $trait['use'])
            : implode(';' . PHP_EOL . '    use ', $trait['use']);
            return <<<EOD
                <?php
                $namespace
                trait $traitname { 
                    use $uses; 
                }
                EOD;
        }
    }

    spl_autoload_register([ new AliasAutoloader(), 'autoload' ]);
}
