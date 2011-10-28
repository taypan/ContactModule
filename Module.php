<?php


namespace App\ContactModule;

/**
 * @author Jiří Müller
 */
class Module extends \Venne\Developer\Module\AutoModule {


	public function getName()
	{
		return "contact";
	}


	public function getDescription()
	{
		return "contact description";
	}


	public function getVersion()
	{
		return "0.1";
	}


	public function setRoutes(\Nette\Application\Routers\RouteList $router, $prefix = "")
	{
		$router[] = new \Nette\Application\Routers\Route($prefix, array(
					'module' => 'Contact',
					'presenter' => 'Default',
					'action' => 'default',
		)
		);
	}

	public function hookAdminMenu($menu)
	{
		$nav = new \App\NavigationModule\NavigationEntity("Contact module");
		$nav->addKey("module", "Contact:Admin");
		$menu[] = $nav;
	}

	public function setHooks(\Venne\Application\Container $container, \App\HookModule\Manager $manager)
	{
		parent::setHooks($container, $manager);
		$manager->addHook("admin\\menu", \callback($this, "hookAdminMenu"));
	}
	
	public function setServices(\Venne\Application\Container $container)
	{
		parent::setServices($container);
		$container->services->addService("contact", new \App\PagesModule\Service("pages", $container->doctrineContainer->entityManager, $container->hookManager));
	}
}
