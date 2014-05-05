<?php

class EvaluacionMedicaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
				'actions'=>array( 'index','view', 'admin', 'xHRGetAppointmentDataById' ),
				'users'=>array( Yii::app()->getSession()->get('empleado')->login ),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array( Yii::app()->getSession()->get('empleado')->login ),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EvaluacionMedica;
		$examen_fisico = new ExamenFisico();
		$impresion_diagnostica = new ImpresionDiagnostica();
		$medidas_fisicas = new MedidasFisicas();
		$caracteristicas_fisicas = new CaracteristicasFisicas();
		$antecedentes_deportivos = new AntecedentesDeportivos();
		$antecedentes_ginecobstetricos = new AntecedentesGinecobstetricos();
		$antecedentes_trauma_lesion = new AntecedentesTraumaLesion();
		$datos_extra_usuario = new DatosExtraUsuario();
		$antecedentes_patologicos = new AntecedentesPatologicos();

		$citas_programadas = parent::getAppoinmetsToday( 'medica' );	
		$listado_eps = Eps::model()->findAll( array( 'order'=>'nombre asc' ) );//Listado de registros EPS
		$listado_deportes = Deporte::model()->findAll( array( 'order'=>'nombre asc' ) );//Listado de deportes	

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if( isset( $_POST['EvaluacionMedica'],
					$_POST['DatosExtraUsuario'],
					$_POST['ExamenFisico'],
					$_POST['ImpresionDiagnostica'],
					$_POST['MedidasFisicas'],
					$_POST['CaracteristicasFisicas'],
					$_POST['AntecedentesDeportivos'],
					$_POST['AntecedentesGinecobstetricos'],
					$_POST['AntecedentesTraumaLesion'],					
					$_POST['AntecedentesPatologicos'] ) ) {

			$transaction = Yii::app()->db->beginTransaction();

			try{ 

				$model->attributes = $_POST['EvaluacionMedica'];
				$model->fecha_hora = date('Y-m-d H:i:s');
				$model->idHistoria_GYM = $_POST['user_clinic_history'];

				if( $model->validate() ){

					$model->save( false );

					$antecedentes_deportivos->attributes = $_POST['AntecedentesDeportivos'];
					$antecedentes_deportivos->idEvaluacion_medica = $model->getPrimarykey();

					$antecedentes_ginecobstetricos->attributes = $_POST['AntecedentesGinecobstetricos'];
					$antecedentes_ginecobstetricos->idEvaluacion_medica = $model->getPrimarykey();

					$antecedentes_trauma_lesion->attributes = $_POST['AntecedentesTraumaLesion'];
					$antecedentes_trauma_lesion->idEvaluacion_medica = $model->getPrimarykey();

					$antecedentes_patologicos->attributes = $_POST['AntecedentesPatologicos'];
					$antecedentes_patologicos->idEvaluacion_medica = $model->getPrimarykey();

					$medidas_fisicas->attributes = $_POST['MedidasFisicas'];
					$caracteristicas_fisicas->attributes = $_POST['CaracteristicasFisicas'];				

					$impresion_diagnostica->attributes = $_POST['ImpresionDiagnostica'];
					$impresion_diagnostica->idEvaluacion_medica = $model->getPrimarykey();

					/**Si el usuario actual ya posee datos extra se cargan éstos, en caso contrario el registro
					* sigue siendo nuevo.
					*/
					$_exist = DatosExtraUsuario::model()->findByPk( $_POST['user_data_extra_code'] );
					if( $_exist ){
						$datos_extra_usuario = $_exist;
					}									

					$datos_extra_usuario->attributes = $_POST['DatosExtraUsuario'];
					$datos_extra_usuario->idVUsuario = $_POST['user_code'];
					
					$examen_fisico->attributes = $_POST['ExamenFisico'];					

					if( $datos_extra_usuario->validate() &&
						 $impresion_diagnostica->validate() &&						
						 $antecedentes_deportivos->validate() &&
						 $antecedentes_ginecobstetricos->validate() &&
						 $antecedentes_trauma_lesion->validate() && 						 
						 $antecedentes_patologicos->validate() &&
						 $medidas_fisicas->validate() &&
						 $caracteristicas_fisicas->validate() ){
						
						$impresion_diagnostica->save( false );
						$medidas_fisicas->save( false );
						$caracteristicas_fisicas->save( false );
						$antecedentes_deportivos->save( false );
						$antecedentes_ginecobstetricos->save( false );
						$antecedentes_trauma_lesion->save( false );
						$datos_extra_usuario->save( false );
						$antecedentes_patologicos->save( false );	
						
						$examen_fisico->idEvaluacion_medica = $model->getPrimarykey();
						$examen_fisico->idMedidas_fisicas = $medidas_fisicas->getPrimaryKey();
						$examen_fisico->idCaracteristicas_fisicas = $caracteristicas_fisicas->getPrimaryKey();

						if( $examen_fisico->validate() ){

							$examen_fisico->save( false );

							/*Modificamos el estado de la cita llevada a cabo*/
							/*$cita_efectuada = Cita::model()->findByPk( $_POST['appoinments_today'] );
							$cita_efectuada->estado = 'efectuada';
							$cita_efectuada->update( array( 'estado' ) );*/

							$transaction->commit();

							Yii::app()->user->setFlash('success', '<strong>:)!</strong> Los datos se han almacenado correctamente.');
							$this->redirect(array('view','id'=>$model->idEvaluacion_medica));

						}
					}					
				}
			}catch( CException $ex ){

				$transaction->rollback();

				Yii::app()->user->setFlash('error', '<strong>:\'(</strong> Ha ocurrido una excepcion!. ' . $ex->getMessage()
						. ' Comuniquese con el area de sistemas adjuntando este mensaje.' );
				$this->redirect( array( 'create' ) );
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'examen_fisico'=>$examen_fisico,
			'impresion_diagnostica'=>$impresion_diagnostica,
			'medidas_fisicas'=>$medidas_fisicas,
			'caracteristicas_fisicas'=>$caracteristicas_fisicas,
			'antecedentes_deportivos'=>$antecedentes_deportivos,
			'antecedentes_ginecobstetricos'=>$antecedentes_ginecobstetricos,
			'antecedentes_trauma_lesion'=>$antecedentes_trauma_lesion,
			'datos_extra_usuario'=>$datos_extra_usuario,
			'citas_programadas'=>$citas_programadas,
			'listado_eps'=>$listado_eps,
			'listado_deportes'=>$listado_deportes,
			'antecedentes_patologicos'=>$antecedentes_patologicos,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EvaluacionMedica']))
		{
			$model->attributes=$_POST['EvaluacionMedica'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEvaluacion_medica));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EvaluacionMedica');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EvaluacionMedica('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EvaluacionMedica']))
			$model->attributes=$_GET['EvaluacionMedica'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EvaluacionMedica::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-medica-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
