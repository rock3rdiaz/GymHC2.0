<?php
$this->breadcrumbs=array(
	'Citas de pacientes'=>array('admin'),
	'Administrar',
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
	$.fn.yiiGridView.update('cita-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
       	),
)); ?>

<h1 class = 'titles'>Administrar citas de pacientes</h1>

<?php echo CHtml::link('Controles de busqueda','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'buttonLink',
	'url'=>array( '/secretaria/cita/create' ),
	'icon'=>'white ok',
	'type'=>'info',
	'label'=>'Asignar',
	'htmlOptions'=>array( 'rel'=>'tooltip', 'title'=>'Asignar nueva cita' )
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cita-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'idCita',
		array('name'=>'idVUsuario',
			'value'=>'$data->usuario0->getFullName()' ),
		'tipo',
		'fecha:datetime:Fecha',
		'motivo',
		array( 'name'=>'Empleado_idEmpleado',
			'value'=>'$data->empleado0->getFullName()' ),
		'estado',				
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{cancell}',
			'buttons'=>array(
				'cancell'=>array(
					'icon'=>'remove',
					'label'=>'Cancelar cita',					
					'url'=>'Yii::app()->createUrl("secretaria/cita/cancell", array("id"=>$data->primaryKey))',
					'visible'=>'$data->estado == "pendiente" ? true : false'
					)
			)	
		),
	),
)); ?>
