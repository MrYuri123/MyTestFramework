<?php
namespace vendor;

/**
* Main View class.
*/
class View
{
    private $viewUrl;

	/**
	 * This func finds view and include it.
	 */
	public function init($controllerClass, $viewName, $variabels)
	{
		// TODO: add exception if controller does not exists.
		// TODO: add default controller.
		$file = file_exists('controllers/'.$controllerClass.'.php');

		if ($file === true){
            $controllerName = strtolower(explode('Controller', $controllerClass)[0]);
			$this->viewUrl = 'views/'.$controllerName.'/'.$viewName.'.php';
			$viewFile = file_exists($this->viewUrl);

			//init vars
			if (!empty($variabels)){
                foreach ($variabels as $key => $value){
					$$key = $value;
				}
			}

			// TODO: add exception if view does not exists.
			if ($viewFile === true) {
                include_once $this->viewUrl;
			}
		}
	}
}
