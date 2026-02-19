<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Extension;

use Joomla\CMS\Extension\BootableExtensionInterface;
use Joomla\CMS\Extension\MVCComponent;
use Psr\Container\ContainerInterface;

defined('_JEXEC') or die;

class ExtensionsCreatorComponent extends MVCComponent implements BootableExtensionInterface
{
    public function boot(ContainerInterface $container)
    {
    }
}
