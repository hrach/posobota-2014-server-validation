<?php

namespace Skrasek\Posobota\FormsDemo;

use Nette\Configurator;


require_once __DIR__ . '/../vendor/autoload.php';


$configurator = new Configurator();
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->enableDebugger();
$configurator->createRobotLoader()->addDirectory(__DIR__)->register();
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

return $configurator->createContainer();
