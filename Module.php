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


}
