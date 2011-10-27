<?php

namespace App\EmptyModule;

use Nette\Environment;
use Venne\Application\UI;
/**
 * @resource EmptyModule
 */
class DefaultPresenter extends \Venne\Developer\Presenter\FrontPresenter {

	public function getModel(){
		if(isset($this->model)){
			return $this->model;
		} else {
			$this->model = New EmptyModel();
		}
	}
	
	/**
	 * @privilege read
	 */


}