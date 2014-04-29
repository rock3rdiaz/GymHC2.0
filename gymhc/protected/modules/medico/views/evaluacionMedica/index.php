<?php
$this->breadcrumbs=array(
	'Evaluacion Medicas',
);

$this->menu=array(
	array('label'=>'Create EvaluacionMedica','url'=>array('create')),
	array('label'=>'Manage EvaluacionMedica','url'=>array('admin')),
);
?>

<h1>Evaluacion Medicas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
