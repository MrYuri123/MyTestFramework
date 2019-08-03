<?php
namespace vendor;

use vendor\Router;
/**
* Main class of all app.
*/
class Fm
{
	public function __run()
	{
		//add and run router class
		$router = new Router($_SERVER['REQUEST_URI']);

		//run controller
        $router->run_controller();
	}
}
