<?php

namespace Skrasek\Posobota\FormsDemo;

use Nette\Application\UI\ISignalReceiver;
use Nette\Forms\Controls\TextInput;
use Nette\Utils\Callback;
use Nextras\Forms\Controls\Fragments\ComponentControlTrait;


class ServerValidatedTextInput extends TextInput implements ISignalReceiver
{
	use ComponentControlTrait;

	private $serverValidators = [];


	public function addServerRule($validator, $message, $arg = NULL)
	{
		$this->addRule($validator, $message, $arg);
		$this->serverValidators[] = [$validator, $message, $arg];
		return $this;
	}


	public function getControl()
	{
		$el = parent::getControl();
		if ($this->serverValidators) {
			$rules = $el->{'data-nette-rules'};
			$rules[] = [
				'op' => 'serverValidate',
				'arg' => $this->link('//serverValidate!'),
			];

			$el->{'data-nette-rules'} = $rules;
		}
		return $el;
	}


	public function handleServerValidate()
	{
		$presenter = $this->getPresenter();
		$this->setValue($presenter->getParameter('serverValidatedTextInputValue'));

		$payload = ['valid' => TRUE];
		foreach ($this->serverValidators as $validator) {
			if (!Callback::invoke($validator[0], $this, $validator[2])) {
				$payload = ['valid' => FALSE, 'msg' => $validator[1]];
				break;
			}
		}

		$presenter->sendJson($payload);
	}

}
