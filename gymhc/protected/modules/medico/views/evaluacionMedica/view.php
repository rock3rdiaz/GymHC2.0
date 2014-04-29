<?php
$this->breadcrumbs=array(
	'Mis evaluaciones medicas'=>array('admin'),
	$model->idEvaluacion_medica,
);

/*$this->menu=array(
	array('label'=>'List EvaluacionMedica','url'=>array('index')),
	array('label'=>'Create EvaluacionMedica','url'=>array('create')),
	array('label'=>'Update EvaluacionMedica','url'=>array('update','id'=>$model->idEvaluacion_medica)),
	array('label'=>'Delete EvaluacionMedica','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvaluacion_medica),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvaluacionMedica','url'=>array('admin')),
);*/
?>


<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
       	),
)); ?>

<h1 class="titles">Detalles de la evaluaci&oacute;n m&eacute;dica No. <?php echo $model->idEvaluacion_medica; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idEvaluacion_medica',
		'enfermedad_actual',
		'fecha_hora',
		'idHistoria_GYM',
	),
)); ?>
