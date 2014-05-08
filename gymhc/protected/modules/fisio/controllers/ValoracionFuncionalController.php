<?php

class ValoracionFuncionalController extends Controller
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
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','xHRGetAppointmentDataById'),
				'users'=>array( Yii::app()->getSession()->get('empleado')->login ),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','view', 'index' ),
				'users'=>array( Yii::app()->getSession()->get('empleado')->login ),
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
		$model = new ValoracionFuncional();
		$antecedentes_usuario = new AntecedentesUsuario();
		$medidas_antropometricas = new MedidasAntropometricas();
		$perimetro = new Perimetro();
		$pliegue = new Pliegue();
		$test_funcional = new TestFuncional();
		$frecuencia_entrenamiento = new FrecuenciaEntrenamiento();

		$citas_programadas = parent::getAppoinmetsToday( 'funcional' );		

		if( isset( $_POST['ValoracionFuncional'],
					$_POST['AntecedentesUsuario'],
					$_POST['MedidasAntropometricas'],
					$_POST['Perimetro'],
					$_POST['Pliegue'],
					$_POST['TestFuncional'],
					$_POST['FrecuenciaEntrenamiento'] ) ){					

			$transaction = Yii::app()->db->beginTransaction();

			try{

				$model->attributes=$_POST['ValoracionFuncional'];
				$model->fecha_hora = date('Y-m-d H:i:s');
				$model->idHistoria_GYM = $_POST['user_clinic_history'];

				if( $model->validate() ){

					$model->save( false );
					
					$antecedentes_usuario->attributes=$_POST['AntecedentesUsuario'];
					$antecedentes_usuario->idValoracion_funcional = $model->getPrimaryKey();

					$medidas_antropometricas->attributes=$_POST['MedidasAntropometricas'];
					$medidas_antropometricas->idValoracion_funcional = $model->getPrimaryKey();

					$perimetro->attributes=$_POST['Perimetro'];
					$perimetro->idValoracion_funcional = $model->getPrimaryKey();

					$pliegue->attributes=$_POST['Pliegue'];
					$pliegue->idValoracion_funcional = $model->getPrimaryKey();

					$test_funcional->attributes=$_POST['TestFuncional'];
					$test_funcional->idValoracion_funcional = $model->getPrimaryKey();

					$frecuencia_entrenamiento->attributes=$_POST['FrecuenciaEntrenamiento'];
					$frecuencia_entrenamiento->idValoracion_funcional = $model->getPrimaryKey();

					if( $antecedentes_usuario->validate() &&
						$medidas_antropometricas->validate() &&
						$perimetro->validate() &&
						$pliegue->validate() &&
						$test_funcional->validate() &&
						$frecuencia_entrenamiento->validate() ){

						$antecedentes_usuario->save( false );
						$medidas_antropometricas->save( false );
						$perimetro->save( false );
						$pliegue->save( false );
						$test_funcional->save( false );
						$frecuencia_entrenamiento->save( false );

						/*Modificamos el estado de la cita llevada a cabo*/
						$cita_efectuada = Cita::model()->findByPk( $_POST['appoinments_today'] );
						$cita_efectuada->estado = 'efectuada';
						$cita_efectuada->update( array( 'estado' ) );

						$transaction->commit();

						Yii::app()->user->setFlash('success', '<strong>:)!</strong> Los datos se han almacenado correctamente.');
						$this->redirect(array('view','id'=>$model->idValoracion_funcional));
					}
				}

			}catch(Exception $ex){

				$transaction->rollback();
				Yii::app()->user->setFlash('error', '<strong>:\'(</strong> Ha ocurrido una excepcion!. ' . $ex->getMessage()
						. ' Comuniquese con el area de sistemas adjuntando este mensaje.' );
				$this->redirect( array( 'create' ) );
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
			'citas_programadas'=>$citas_programadas,
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
		$this->performAjaxValidation( array(
			'model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
		) );

		if( isset( $_POST['ValoracionFuncional'],
					$_POST['AntecedentesUsuario'],
					$_POST['MedidasAntropometricas'],
					$_POST['Perimetro'],
					$_POST['Pliegue'],
					$_POST['TestFuncional'],
					$_POST['FrecuenciaEntrenamiento'] ) ){

			$model->attributes=$_POST['ValoracionFuncional'];
			if($model->save()){

				Yii::app()->user->setFlash('success', '<strong>:)!</strong> Los datos se han actualizado correctamente.');
				$this->redirect(array('view','id'=>$model->idValoracion_funcional));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
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
		$dataProvider=new CActiveDataProvider('ValoracionFuncional');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ValoracionFuncional('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ValoracionFuncional']))
			$model->attributes=$_GET['ValoracionFuncional'];

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
		$model=ValoracionFuncional::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='valoracion-funcional-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
