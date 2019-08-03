<?php
namespace vendor;
/**
* Main class for routing
*/
use controllers;

class Router
{
    public $controller;
    public $view;

	public function __construct($request)
	{
		$request_url = strtok($request, '?');
        $this->controller = explode('/', $request_url)[1];
		$this->view       = explode('/', $request_url)[2];
	}

	public function run_controller()
	{
		$controllerFiles = scandir('controllers');

        //// TODO: add exception for empty controllers
		// TODO: add default redirect
		foreach ($controllerFiles as $file){
			$fileName = explode('Controller.php', $file)[0];
			if (strtolower($this->controller) == strtolower($fileName)) {

                $inctanceClass = explode('.php', $file)[0];

				$classInit = '\controllers\\'.$inctanceClass;
				$controllerObject = new $classInit();
				$controllerObject->__run($this->view);
			}
		}

	}
}
