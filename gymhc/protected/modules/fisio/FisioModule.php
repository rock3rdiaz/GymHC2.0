<?php

class FisioModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'fisio.models.*',
			'fisio.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		$controller->menu_title = 'FISIOTERAPEUTA';
		$controller->brand_url_menu = '/fisio/default/index';

		if(parent::beforeControllerAction($controller, $action))
		{
			return $controller->menu_items = array(
                array('label'=>'Trabajo con pacientes', 'url'=>'#', 'icon'=>'user',
                	'items'=>array(
                		array( 'label'=>'Valoraciones funcionales', 'icon'=>'white heart',
                			'url'=>array('/fisio/valoracionFuncional/admin') ),
                		array( 'label'=>'Programas de entrenamiento', 'icon'=>'white signal', 
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