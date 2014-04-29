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

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
       	),
)); ?>

<h1 class='titles'>Nueva valoraci&oacute;n funcional</h1>

<?php echo $this->renderPartial('_form', 
	array('model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
			'citas_programadas'=>$citas_programadas,
	)); ?>