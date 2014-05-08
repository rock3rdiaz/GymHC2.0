<?php

class SecretariaModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'secretaria.models.*',
			'secretaria.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		$controller->menu_title = 'SECRETARIA';
		$controller->brand_url_menu = '/secretaria/default/index';

		if(parent::beforeControllerAction($controller, $action))
		{
			return $controller->menu_items = array(
                array('label'=>'Actividades generales', 'url'=>'#', 'icon'=>'list',
                	'items'=>array(
                		array( 'label'=>'Citas de pacientes', 'icon'=>'white calendar',
                			'url'=>array('/secretaria/cita/admin') ),
                		)
                ),

                array('label'=>'Reportes', 'url'=>'#', 'icon'=>'file',
                	'items'=>array(
                		array( 'label'=>'Valoraciones funcionales', 'icon'=>'white hand-right',
                			'url'=>array('/secretaria/report/valoracionFuncional') ),
                		
                		array( 'label'=>'Evaluaciones medicas', 'icon'=>'white hand-left',
                			'url'=>array('/secretaria/report/evaluacionMedica') ),
                		)
                ),             
            );
		}
		else
			return false;
	}
}
