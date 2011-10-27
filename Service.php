<?php

/**
 * Venne:CMS (version 2.0-dev released on $WCDATE$)
 *
 * Copyright (c) 2011 Josef Kříž pepakriz@gmail.com
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace App\EmptyModule;

use Venne;

/**
 * @author Jiří Müller
 */
class Service extends \Venne\Developer\Service\DoctrineService {

	public $entityNamespace = "\\App\\EmptyModule\\";


	/**
	 * @return EmptyModel 
	 */
	public function createServiceModel()
	{
		return new EmptyModel($this);
	}


	public function hookAdminMenu($menu)
	{
		$nav = new \App\NavigationModule\NavigationEntity("Empty module");
		$nav->addKey("module", "Empty:Admin");
		$menu[] = $nav;
	}
	
	

}