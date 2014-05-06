<?php
$this->breadcrumbs=array(
	'Valoraciones funcionales'=>array('valoracionFuncional'),
	'Registros almacenados',
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
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

<h1 class = 'titles'>Valoraciones funcionales registradas</h1>

<?php echo CHtml::link('Controles de busqueda','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchVF',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'valoracion-funcional-grid',
	'type'=>'stripped condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idHistoria_GYM',
		'idValoracion_funcional',
		array( 'name'=>'idVUsuario', 'header'=>'Paciente',
			'value'=>'$data->idHistoriaGYM->idusuario0->getFullName()' ),
		'objetivo_ejercicio',		
		array('name'=>'fecha_hora', 'type'=>'datetime' ),
		'programa_entrenamiento',		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{pdf}',
			'buttons'=>array(
				'pdf'=>array(
					'icon'=>'icon-print',
					'label'=>'Imprimir valoracion',
					'options'=>array( 'target'=>'_blank' ),					
					'url'=>'Yii::app()->createUrl("secretaria/report/pdf", array("id"=>$data->primaryKey, "type"=>"vf"))',					
				)
			)
		),
	),
)); ?>
