<?php
namespace controllers;

use vendor\Controller;
use vendor\Model;
/**
 * Second controller for testing
 */
class SecondController extends Controller
{

	public function actionIndex()
	{
		$model = new Model();
		$result = $model->find("1");
		die(var_dump($result));
		$this->render('index');
	}

	public function actionTest()
	{
		$this->render('test');
	}
}
