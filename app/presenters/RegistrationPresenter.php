<?php

namespace Skrasek\Posobota\FormsDemo;

use Kdyby\Autowired\AutowireComponentFactories;
use Nette\Application\UI\Presenter;


final class RegistrationPresenter extends Presenter
{
	use AutowireComponentFactories;


	public function renderDefault()
	{
	}


	protected function createComponentRegistrationForm(RegistrationFormFactory $registrationFormFactory)
	{
		return $registrationFormFactory->create();
	}

}
