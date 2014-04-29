<?php
$this->breadcrumbs=array(
	'Evaluacion Medicas'=>array('index'),
	$model->idEvaluacion_medica=>array('view','id'=>$model->idEvaluacion_medica),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaluacionMedica','url'=>array('index')),
	array('label'=>'Create EvaluacionMedica','url'=>array('create')),
	array('label'=>'View EvaluacionMedica','url'=>array('view','id'=>$model->idEvaluacion_medica)),
	array('label'=>'Manage EvaluacionMedica','url'=>array('admin')),
);
?>

<h1>Update EvaluacionMedica <?php echo $model->idEvaluacion_medica; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>