<?php

class ReportController extends Controller
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
				'actions'=>array('valoracionFuncional','evaluacionMedica', 'pdf'),
				'users'=>array( Yii::app()->getSession()->get('empleado')->login ),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionValoracionFuncional()
	{
		$model=new ValoracionFuncional('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ValoracionFuncional']))
			$model->attributes=$_GET['ValoracionFuncional'];		

		$this->render('valoracionFuncional',
			array( 'model'=>$model )
		);
	}

	public function actionEvaluacionMedica()
	{
		$model=new EvaluacionMedica('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EvaluacionMedica']))
			$model->attributes=$_GET['EvaluacionMedica'];		

		$this->render('evaluacionMedica',
			array( 'model'=>$model )
		);
	}

	/**
	 * @summary: Accion que recupera los objetos involucrados en la valoracion funcional o evaluacion medica
	 * @param  [int] $id [Pk de la valoracion funcional o evaluacion medica a imprimir]
	 * @param  [int] $type [Tipo de reporte a imprimir. 'vf' = Valoracion Funcional, 'em' = EvaluacionMedica ]
	 * @return [type]     [description]
	 */
	public function actionPdf( $id, $type ){

		if( $type == 'vf' ){
			$model = ValoracionFuncional::model()->findByPk( $id );
			$_view = 'pdfVF';
		}else{
			$model = EvaluacionMedica::model()->findByPk( $id );
			$_view = 'pdfEM';
		}

		$usuario = $model->idHistoriaGYM->idusuario0->getFullName();
		
		
		$this->renderPartial( $_view,
				array( 'model'=>$model,
						'usuario'=>$usuario ) );
	}
}