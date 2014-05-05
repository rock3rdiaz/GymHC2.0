<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/*Menu de opciones, sitio por defect y titulo del menu de cada modulo*/
	public $menu_items = array();
	public $menu_title = '::. GymHC .::';
	public $brand_url_menu = '';

	/**
	 * @summary: Metodo que construye un arreglo con las citas del dia y la fecha actual. 
	 * Utilizado por los controladores 'valoracionFuncionalController' y 'evaluacionMedicaController'.
	 * @param  [string] $type [Tipo de citas a recuperar. Puede ser 'funcional' o 'medica']
	 * @return [array]  $res [Arreglo con los datos listos para presentar en la vista]
	 */
	public function getAppoinmetsToday( $type ){

		$appointments_today = array();

		$data_provider = Cita::model()->appointmentsToday( $type );
		$data_provider->setPagination( false );
		$list = $data_provider->getData( true );

		if( count( $list ) ){
			foreach( $list as $l ){
				$usuario = VUsuarios::model()->findByAttributes( array( 'id_usuarios'=>$l->idVUsuario ) );
				$appointments_today[ $l->idCita ] = $usuario->getFullName();
			}
		}

		return $appointments_today;		
	}

	/**
	 * @summary: Metodo xhr que retorna los datos de la cita, datos extra del paciente
	 * y datos asociado a éste encontrados en la BD gymcq filtrados
	 * por el id tomado como argumento GET. Util en los controladores 
	 * 'ValoracionFuncional' y 'EvaluacionMedica'
	 * @return [type] [description]
	 */
	public function actionXHRGetAppointmentDataById(){

		$data = array();//Arreglo de objetos a retornar

		$id = CJSON::decode( $_GET['id'] );//Dato enviado desde js :)

		$cita = Cita::model()->findByPk( $id );
		$cita['fecha'] = Yii::app()->format->dateTime( $cita->fecha );

		$usuario = VUsuarios::model()->findByAttributes( array( 'id_usuarios'=>$cita->idVUsuario ) );
		$usuario['primer_nombre'] = $usuario->getFullName();
		$usuario['fecha_nac'] = Yii::app()->format->dateTime( $usuario->fecha_nac );

		$historia_gym = HistoriaGym::model()->findByAttributes( array( 'idVUsuario'=>$cita->idVUsuario ) );

		/*Si el usuario no posee historia clinica, se le crea una automaticamente*/
		if( ! $historia_gym ){
			$historia_gym = new HistoriaGym();
			$historia_gym->estado = 'activa';
			$historia_gym->idVUsuario = $cita->idVUsuario;
			$historia_gym->save();
		}	

		$datos_extra_usuario = DatosExtraUsuario::model()
									->findByAttributes( array( 'idVUsuario'=>$cita->idVUsuario ) );

		if( ! $datos_extra_usuario ){

			$datos_extra_usuario = new DatosExtraUsuario();			
		}

		$data[ 'appointment' ] = $cita;
		$data[ 'user' ] = $usuario;
		$data[ 'clinic_history' ] = $historia_gym;
		$data[ 'extra_user_data' ] = $datos_extra_usuario;
		
		echo CJSON::encode( $data );
	}
}