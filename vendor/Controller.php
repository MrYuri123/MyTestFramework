<?php
namespace vendor;

use vendor\View;
/**
* Main controller of the app.
*/
abstract class Controller
{
	/**
	* Each controller have to release Singleton pattern
	*/

	/**
	* This method runs action.
	*/
	public function __run($view = null)
	{
		if ($view == null){
            //TODO add exeption if actionIndex not exists.
            $this->actionIndex();
		} else {
			$view = ucfirst(strtolower($view));
			$methodName = 'action' . $view;
			$this->$methodName();
		}
	}

    /**
	* Render 'view' file
	*/
	public function render($viewName, $variabels = [])
	{
		$controllerClass = explode('controllers\\', get_class($this))[1];
		$view = new View();

        $view->init($controllerClass, $viewName, $variabels);
	}
}
