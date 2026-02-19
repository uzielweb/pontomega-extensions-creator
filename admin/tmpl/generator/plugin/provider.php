<?php
namespace {{namespace }}\Service\Provider;

use Joomla\CMS\Dispatcher\DispatcherFactoryInterface;
use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Extension\Service\Provider\Plugin;
use Joomla\CMS\Extension\Service\Provider\PluginDispatcherFactory;
use Joomla\CMS\Factory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use {{namespace }}\Extension\{ {name }}

defined('_JEXEC') or die;

return new class implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->registerServiceProvider(new PluginDispatcherFactory('{{namespace}}'));
        $container->registerServiceProvider(new Plugin());

        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin = new {{name}}(
                    $container->get(DispatcherFactoryInterface::class),
                    (array) Factory::getApplication()->getPlugin('{{group}}', '{{lowerName}}')
                );
                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
