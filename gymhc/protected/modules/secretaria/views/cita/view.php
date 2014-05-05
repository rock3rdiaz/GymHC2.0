<?php
$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->idCita,
);

$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
	array('label'=>'Update Cita','url'=>array('update','id'=>$model->idCita)),
	array('label'=>'Delete Cita','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cita','url'=>array('admin')),
);
?>

<h1>View Cita #<?php echo $model->idCita; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idCita',
		'tipo',
		'fecha',
		'motivo',
		'Empleado_idEmpleado',
		'estado',
		'idVUsuario',
	),
)); ?>
