<?php

class MedicoModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'medico.models.*',
			'medico.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		$controller->menu_title = 'MEDICO GENERAL';
		$controller->brand_url_menu = '/medico/default/index';

		if(parent::beforeControllerAction($controller, $action))
		{
			return $controller->menu_items = array(
                array('label'=>'Trabajo con pacientes', 'url'=>'#', 'icon'=>'user',
                	'items'=>array(
                		array( 'label'=>'Evaluaciones medicas', 'icon'=>'white heart',
                			'url'=>array('/medico/evaluacionMedica/admin') ),
                		array( 'label'=>'Examenes', 'icon'=>'white plus-sign', 
                			'url'=>array('#') ) 
                		)
                ),
                array('label'=>'Mi cuenta', 'url'=>'#', 'icon'=>'home',
                	'items'=>array(
                		array( 'label'=>'Mis datos', 'icon'=>'white check',
                			'url'=>array( '#' ) )
                	)
                ),               
            );
		}
		else
			return false;
	}
}
