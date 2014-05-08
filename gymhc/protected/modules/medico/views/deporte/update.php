<?php
$this->breadcrumbs=array(
	'Administrar deportes'=>array('admin'),
	$model->idDeporte=>array('view','id'=>$model->idDeporte),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List Deporte','url'=>array('index')),
	array('label'=>'Create Deporte','url'=>array('create')),
	array('label'=>'View Deporte','url'=>array('view','id'=>$model->idDeporte)),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);*/
?>

<h1 class="titles">Actualizar deporte No. <?php echo $model->idDeporte; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>