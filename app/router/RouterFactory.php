<?php

namespace Skrasek\Posobota;


use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function create()
	{
		$router = new RouteList();
		$router[] = new Route('<presenter>/<action>', 'Registration:default');
		return $router;
	}

}
