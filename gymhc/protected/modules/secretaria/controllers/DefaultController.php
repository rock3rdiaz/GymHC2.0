<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index',
			array( 'empleado'=>Yii::app()->getSession()->get('empleado') )
		);
	}
}