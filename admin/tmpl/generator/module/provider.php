<?php
namespace {{namespace }}\Service\Provider;

use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

defined('_JEXEC') or die;

return new class implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->registerServiceProvider(new MVCFactory('{{namespace}}'));
        $container->registerServiceProvider(new ModuleDispatcherFactory('{{namespace}}'));
        $container->registerServiceProvider(new Module());
    }
};
