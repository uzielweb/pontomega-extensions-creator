<?php

namespace Pontomega\Component\ExtensionsCreator\Administrator\Service\Provider;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Pontomega\Component\ExtensionsCreator\Administrator\Extension\ExtensionsCreatorComponent;

defined('_JEXEC') or die;

return new class implements ServiceProviderInterface
{
	public function register(Container $container)
	{
		$container->registerServiceProvider(new MVCFactory('\\Pontomega\\Component\\ExtensionsCreator'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\Pontomega\\Component\\ExtensionsCreator'));

		$container->set(
			ComponentInterface::class,
			function (Container $container) {
				$component = new ExtensionsCreatorComponent(
					$container->get(ComponentDispatcherFactoryInterface::class),
					$container->get(MVCFactoryInterface::class)
				);

				return $component;
			}
		);
	}
};