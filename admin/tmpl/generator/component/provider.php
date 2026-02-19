<?php
namespace {{namespace }}\Administrator\Service\Provider;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use {{namespace }}\Administrator\Extension\{ {componentName }}Component;

defined('_JEXEC') or die;

return new class implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->registerServiceProvider(new MVCFactory('{{slashedNamespace}}'));
        $container->registerServiceProvider(new ComponentDispatcherFactory('{{slashedNamespace}}'));

        $container->set(
            ComponentInterface::class,
            function (Container $container) {
                $component = new {{componentName}}Component(
                    $container->get(ComponentDispatcherFactoryInterface::class),
                    $container->get(MVCFactoryInterface::class)
                );

                return $component;
            }
        );
    }
};
