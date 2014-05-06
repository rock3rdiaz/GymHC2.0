<?php
$this->breadcrumbs=array(
	'Citas de pacientes'=>array('admin'),
	$model->idCita=>array('view','id'=>$model->idCita),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
	array('label'=>'View Cita','url'=>array('view','id'=>$model->idCita)),
	array('label'=>'Manage Cita','url'=>array('admin')),
);*/
?>

<h1 class='titles'>Actualizar cita asignada No. <?php echo $model->idCita; ?></h1>

<?php echo $this->renderPartial('_form', 
		array( 'model'=>$model,
				'usuario'=>$usuario,
				'listado_empleados_habiles'=>$listado_empleados_habiles, ) ); ?>