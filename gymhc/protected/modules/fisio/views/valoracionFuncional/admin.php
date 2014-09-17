<?php
$this->breadcrumbs=array(
	'Mis valoracion funcionales'=>array('admin'),
	'Adminstrar',
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('valoracion-funcional-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class='titles'>Mis valoraciones funcionales</h1>

<?php echo CHtml::link('Controles de busqueda','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'buttonLink',
	'url'=>array( '/fisio/valoracionFuncional/create' ),
	'icon'=>'white ok',
	'type'=>'info',
	'label'=>'Valorar',
	'htmlOptions'=>array( 'rel'=>'tooltip', 'title'=>'Crear nueva valoracion funcional' )
)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'valoracion-funcional-grid',
	'type'=>'stripped condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idHistoria_GYM',
		'idValoracion_funcional',
		array( 'header'=>'Paciente', 
			'value'=>'$data->idHistoriaGYM->idusuario0->getFullName()' ),
		'objetivo_ejercicio',
		//'observaciones',
		array('name'=>'fecha_hora', 'type'=>'datetime' ),
		'programa_entrenamiento',		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
