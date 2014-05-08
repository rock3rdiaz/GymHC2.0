<?php
$this->breadcrumbs=array(
	'Examens'=>array('index'),
	$model->idExamen,
);

$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Create Examen','url'=>array('create')),
	array('label'=>'Update Examen','url'=>array('update','id'=>$model->idExamen)),
	array('label'=>'Delete Examen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idExamen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Examen','url'=>array('admin')),
);
?>

<h1>View Examen #<?php echo $model->idExamen; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idExamen',
		'descripcion',
		'resultado',
		'fecha_realizacion',
		'idEvaluacion_medica',
		'fecha_expedicion',
	),
)); ?>
