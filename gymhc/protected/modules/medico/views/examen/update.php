<?php
$this->breadcrumbs=array(
	'Examens'=>array('index'),
	$model->idExamen=>array('view','id'=>$model->idExamen),
	'Update',
);

$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Create Examen','url'=>array('create')),
	array('label'=>'View Examen','url'=>array('view','id'=>$model->idExamen)),
	array('label'=>'Manage Examen','url'=>array('admin')),
);
?>

<h1>Update Examen <?php echo $model->idExamen; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>