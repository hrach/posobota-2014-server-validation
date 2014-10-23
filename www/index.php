<?php

use Nette\Application\Application;


$coninater = require_once __DIR__ . '/../app/bootstrap.php';
$coninater->getByType(Application::class)->run();
