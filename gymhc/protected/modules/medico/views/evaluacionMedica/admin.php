<?php
$this->breadcrumbs=array(
	'Mis evaluaciones medicas'=>array('admin'),
	'Adminstrar',
);

/*$this->menu=array(
	array('label'=>'List EvaluacionMedica','url'=>array('index')),
	array('label'=>'Create EvaluacionMedica','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('evaluacion-medica-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class='titles'>Mis evaluaciones m&eacute;dicas</h1>

<?php echo CHtml::link('Controles de busqueda','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'buttonLink',
	'url'=>array( '/medico/evaluacionMedica/create' ),
	'icon'=>'white ok',
	'type'=>'info',
	'label'=>'Evaluar',
	'htmlOptions'=>array( 'rel'=>'tooltip', 'title'=>'Crear nueva evaluacion medica' )
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'evaluacion-medica-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idHistoria_GYM',
		'idEvaluacion_medica',
		'enfermedad_actual',
		'fecha_hora:datetime:Fecha Hora',		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
