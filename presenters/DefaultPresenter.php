<?php

namespace App\ContactModule;

use Nette\Environment;
use Venne\Application\UI;
/**
 * @resource ContactModule
 */
class DefaultPresenter extends \Venne\Developer\Presenter\FrontPresenter {


	/**
	 * @privilege read
	 */
	public function createComponentContactForm($name){
		$form = new \Nette\Application\UI\Form;
		$form->addText('name', 'Jméno:')
		->setRequired('Zadejte prosím jméno');
		$form->addText('email', 'Email:')
		->setRequired('Zadejte prosím email')
		->addRule(\Nette\Application\UI\Form::EMAIL, 'Zadejte platný email');
		$form->addTextArea('message', 'Zpráva:')
		->addRule(\Nette\Application\UI\Form::MAX_LENGTH, 'Zpráva je příliš dlouhá', 1000)
		->setRequired('Zadejte prosím zprávu');
		$form->addSubmit('send', 'Odeslat');

		$form->onSuccess[] = callback($this, 'contactFormSubmitted');

		return $form;
	}

	public function renderDefault(){
		$this->template->entity = $this->context->services->contact->getRepository()->findOneBy(array("url" => "contact"));
		
	}

	public function contactFormSubmitted($form)
	{
		$values = $form->getValues();
		$msg = "Odesláno!";

		$mail = new \Nette\Mail\Message;
		$mail->setFrom("$values->name <$values->email>")  // gmail pravdepodobne ignoruje
		->addTo($this->context->params["adminMail"])
		->setSubject("Zpráva - Venne")
		->setBody($values->message);


		try {
			$this->send($mail);
		} catch (Exception $e) {
			$msg = "Odeslání selhalo!";
		}
		$this->flashMessage($msg);
		$this->redirect('this');

	}


	public function send($mail){
		$mailer = new \Nette\Mail\SmtpMailer($this->context->params["smtp"]);
		$mailer->send($mail);

	}



}
