<?php
$this->breadcrumbs=array(
	'Evaluacion Medicas'=>array('evaluacionMedica'),
	'Registros almacenados',
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

<h1 class="titles">Evaluaciones m&eacute;dicas registradas</h1>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchEM',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'evaluacion-medica-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idHistoria_GYM',
		'idEvaluacion_medica',		
		array( 'name'=>'idVUsuario', 'header'=>'Paciente',
			'value'=>'$data->idHistoriaGYM->idusuario0->getFullName()' ),
		'enfermedad_actual',
		'fecha_hora:datetime:Fecha Hora',				
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{pdf}',
			'buttons'=>array(
				'pdf'=>array(
					'icon'=>'icon-print',
					'label'=>'Imprimir evaluacion',
					'options'=>array( 'target'=>'_blank' ),					
					'url'=>'Yii::app()->createUrl("secretaria/report/pdf", array("id"=>$data->primaryKey, "type"=>"em"))',					
				)
			)
		),
	),
)); ?>