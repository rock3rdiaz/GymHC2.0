<?php
$this->breadcrumbs=array(
	'Mis valoraciones funcionales'=>array('admin'),
	$model->idValoracion_funcional,
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
	array('label'=>'Update ValoracionFuncional','url'=>array('update','id'=>$model->idValoracion_funcional)),
	array('label'=>'Delete ValoracionFuncional','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idValoracion_funcional),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
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

<h1 class="titles">Detalles de la valoracion funcional No. <?php echo $model->idValoracion_funcional; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idValoracion_funcional',
		'objetivo_ejercicio',
		'observaciones',
		'fecha_hora',
		'programa_entrenamiento',
		'idHistoria_GYM',
	),
)); ?>
