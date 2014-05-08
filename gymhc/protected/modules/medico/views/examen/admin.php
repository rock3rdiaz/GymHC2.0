<?php
$this->breadcrumbs=array(
	'Administrar examanes'=>array('admin'),
	'Administrar',
);

/*$this->menu=array(
	array('label'=>'List Examen','url'=>array('index')),
	array('label'=>'Create Examen','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('examen-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="titles">Adminsitrar Ex&aacute;manes</h1>

<?php echo CHtml::link('Controles de busqueda','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'buttonLink',
	'url'=>array( '/medico/examen/create' ),
	'icon'=>'white ok',
	'type'=>'info',
	'label'=>'Adicionar',
	'htmlOptions'=>array( 'rel'=>'tooltip', 'title'=>'Solicitar examen' )
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'examen-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idExamen',
		'descripcion',
		'resultado',
		'fecha_realizacion',
		'idEvaluacion_medica',
		'fecha_expedicion',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
