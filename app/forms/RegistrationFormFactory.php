<?php

namespace Skrasek\Posobota\FormsDemo;

use Nette\Application\UI\Form;


final class RegistrationFormFactory
{

	public function create()
	{
		$form = new Form();
		$form->addText('email', 'E-mail');
		$form->addPassword('password', 'Password');

		$form->addSubmit('register', 'Registrovat');
		$form->onSuccess[] = [$this, 'processRegistration'];
		return $form;
	}


	public function processRegistration(Form $form, $values)
	{
		dump($values);
	}

}
