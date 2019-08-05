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
		$this->render('index');
	}

	public function actionTest()
	{
		$this->render('test');
	}
}
