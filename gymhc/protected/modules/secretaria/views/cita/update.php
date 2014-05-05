<?php
$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->idCita=>array('view','id'=>$model->idCita),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
	array('label'=>'View Cita','url'=>array('view','id'=>$model->idCita)),
	array('label'=>'Manage Cita','url'=>array('admin')),
);
?>

<h1>Update Cita <?php echo $model->idCita; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>