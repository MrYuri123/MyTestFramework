<?php
namespace controllers;

use vendor\Controller;

class FirstController extends Controller
{
    public function actionTest()
	{
		echo "Test action";
	}

	public function actionIndex()
	{
		$this->render('index', [
			'test' => 'Test value!',
		]);
	}

	public function actionSecond()
	{
		$this->render('test');
	}
}
