<?php


namespace App\ContactModule;

use Venne\ORM\Column;
use Nette\Utils\Html;
use Venne\Forms\Form;


class ContactAdminForm extends \Venne\Forms\EntityForm {


	public function startup()
	{
		parent::startup();
		
		//$model = $this->presenter->context->services->contact;
		
		$this->addEditor("text", "", Null, 20);
	}

	public function save()
	{
		//$this->model->save()
	}


	protected function getLinkParams()
	{
		return array(
			"module"=>"Pages",
			"presenter"=>"Default",
			"action"=>"default",
			"url"=>$this->key->url
			);
	}


	protected function getModuleName()
	{
		return "contact";
	}


	protected function getModuleItemId()
	{
		return $this->key->id;
	}

}
