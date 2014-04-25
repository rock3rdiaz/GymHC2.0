<?php
$this->breadcrumbs=array(
	'Mis valoraciones funcionales'=>array('admin'),
	'Nueva valoracion',
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);*/
?>

<h1 class='titles'>Nueva valoraci&oacute;n funcional</h1>

<?php echo $this->renderPartial('_form', 
	array('model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
	)); ?>