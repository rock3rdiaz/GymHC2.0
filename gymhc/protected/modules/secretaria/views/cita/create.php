<?php
$this->breadcrumbs=array(
	'Citas de pacientes'=>array('admin'),
	'Nueva asignacion de cita',
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Manage Cita','url'=>array('admin')),
);*/
?>

<h1 class='titles'>Nueva asignaci&oacute;n de cita</h1>

<?php echo $this->renderPartial('_form', 
		array( 'model'=>$model,
				'listado_empleados_habiles'=>$listado_empleados_habiles, ) ); ?>