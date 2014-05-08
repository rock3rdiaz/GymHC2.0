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
                		array( 'label'=>'Deportes', 'icon'=>'white flag', 
                			'url'=>array('/medico/deporte/admin') ),                		
                		array( 'label'=>'Evaluaciones medicas', 'icon'=>'white heart',
                			'url'=>array('/medico/evaluacionMedica/admin') ),
                		array( 'label'=>'Examenes', 'icon'=>'white briefcase', 
                			'url'=>array('/medico/examen/admin') ) 
                		)
                ),            
            );
		}
		else
			return false;
	}
}
