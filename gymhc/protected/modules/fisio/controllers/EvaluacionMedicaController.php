<?php

class EvaluacionMedicaController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array( 'getHistory' ),
				'users'=>array( Yii::app()->getSession()->get('empleado')->login ),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * @summary: Accion que busca y retorna todas las evaluaciones medicas encontradas para el usuario definido po
	 * el codigo recepcionado via ajax. Utilizada como marco de referencia antes de realizar una valoracion
	 * funcional. Accion utlizada por el controlador 'ValoracionFuncionalController.js' en la app del cliente.
	 * @return [type] [description]
	 */
	public function actionGetHistory()
	{
		$historia_gym = HistoriaGym::model()->findByAttributes( array( 'idVUsuario'=>$_GET['user_code'] ) );
		
		$listado_em = EvaluacionMedica::model()
							->findAllByAttributes( array( 'idHistoria_GYM'=>$historia_gym->primaryKey ),
														array( 'order'=>'fecha_hora desc' ) );

		echo CJSON::encode( $listado_em );
	}
}