<?php

namespace Skrasek\Posobota\FormsDemo;

use Nette\Application\UI\Form;
use Nette\Forms\IControl;
use Nextras\Forms\Rendering\Bs3FormRenderer;


final class RegistrationFormFactory
{

	public function create()
	{
		$form = new Form();

		$input = $form['email'] = new ServerValidatedTextInput('E-mail');
		$input->addRule($form::EMAIL, 'Zadej email ve správném formátu.');
		$input->addServerRule(function(IControl $control) {
			return $control->getValue() !== 'jan@skrasek.com';
		}, 'Zadaný e-mail již existuje.');

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
