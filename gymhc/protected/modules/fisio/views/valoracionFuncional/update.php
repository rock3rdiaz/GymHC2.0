<?php
$this->breadcrumbs=array(
	'Mis valoraciones funcionales'=>array('admin'),
	$model->idValoracion_funcional=>array('view','id'=>$model->idValoracion_funcional),
	'Actualizar valoracion',
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
	array('label'=>'View ValoracionFuncional','url'=>array('view','id'=>$model->idValoracion_funcional)),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);*/
?>

<h1 class="titles">Actualizar datos de valoracion funcional No. <?php echo $model->idValoracion_funcional; ?></h1>

<?php echo $this->renderPartial('_form', 
	array('model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
	)); ?>