<?php
$this->breadcrumbs=array(
	'Administrar deportes'=>array('admin'),
	$model->idDeporte,
);

/*$this->menu=array(
	array('label'=>'List Deporte','url'=>array('index')),
	array('label'=>'Create Deporte','url'=>array('create')),
	array('label'=>'Update Deporte','url'=>array('update','id'=>$model->idDeporte)),
	array('label'=>'Delete Deporte','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idDeporte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);*/
?>

<h1 class="titles">Detalle deporte No. <?php echo $model->idDeporte; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idDeporte',
		'nombre',
	),
)); ?>
