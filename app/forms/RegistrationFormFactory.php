<?php

namespace Skrasek\Posobota\FormsDemo;

use Nette\Application\UI\Form;
use Nextras\Forms\Rendering\Bs3FormRenderer;


final class RegistrationFormFactory
{

	public function create()
	{
		$form = new Form();
		$form->addText('email', 'E-mail');
		$form->addPassword('password', 'Password');

		$form->addSubmit('register', 'Registrovat');
		$form->onSuccess[] = [$this, 'processRegistration'];
		$form->setRenderer(new Bs3FormRenderer());
		return $form;
	}


	public function processRegistration(Form $form, $values)
	{
		dump($values);
	}

}
