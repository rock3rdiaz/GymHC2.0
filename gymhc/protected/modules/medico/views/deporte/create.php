<?php
$this->breadcrumbs=array(
	'Administrar deportes'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Deporte','url'=>array('index')),
	array('label'=>'Manage Deporte','url'=>array('admin')),
);*/
?>

<h1 class="titles">Crear nuevo deporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>