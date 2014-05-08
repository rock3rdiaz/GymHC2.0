<?php
$this->breadcrumbs=array(
	'Administrar examenes'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Manage Examen','url'=>array('admin')),
);*/
?>

<h1 class="titles">Crear examen a evaluaci&oacute;n m&eacute;dica</h1>

<?php echo $this->renderPartial('_form', 
		array( 'model'=>$model,
			'em'=>$em, )); ?>