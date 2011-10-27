<?php


namespace App\EmptyModule;

use \Venne\Developer\Module\Service\IRouteService;

/**
 * @author Jiří Müller
 */
class Module extends \Venne\Developer\Module\AutoModule {


	public function getName()
	{
		return "empty";
	}


	public function getDescription()
	{
		return "empty description";
	}


	public function getVersion()
	{
		return "0.1";
	}


	public function setRoutes(\Nette\Application\Routers\RouteList $router, $prefix = "")
	{
		$router[] = new \Nette\Application\Routers\Route($prefix . '[<url .+>]', array(
					'module' => 'Empty',
					'presenter' => 'Default',
					'action' => 'default',
					'url' => array(
						\Nette\Application\Routers\Route::VALUE => NULL,
						\Nette\Application\Routers\Route::FILTER_IN => NULL,
						\Nette\Application\Routers\Route::FILTER_OUT => NULL,
					)
			)
		);
	}


	public function setServices(\Venne\Application\Container $container)
	{
		parent::setServices($container);
		$container->services->addService("empty", new Service("empty", $container->doctrineContainer->entityManager, $container->hookManager));
	}


	public function setHooks(\Venne\Application\Container $container, \App\HookModule\Manager $manager)
	{
		parent::setHooks($container, $manager);
		$manager->addHook("admin\\menu", \callback($container->services->empty, "hookAdminMenu"));
	}

}
