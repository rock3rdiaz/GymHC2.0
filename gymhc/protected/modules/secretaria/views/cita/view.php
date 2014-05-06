<?php
$this->breadcrumbs=array(
	'Citas de pacientes'=>array('admin'),
	$model->idCita,
);

/*$this->menu=array(
	array('label'=>'List Cita','url'=>array('index')),
	array('label'=>'Create Cita','url'=>array('create')),
	array('label'=>'Update Cita','url'=>array('update','id'=>$model->idCita)),
	array('label'=>'Delete Cita','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cita','url'=>array('admin')),
);*/
?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
       	),
)); ?>

<h1 class='titles'>Detalle de la cita No. <?php echo $model->idCita; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idCita',
		'tipo',
		'fecha:datetime:Fecha',
		'motivo',
		array('name'=>'Empleado_idEmpleado', 'value'=>$model->empleado0->getFullName()),
		'estado',		
		'idVUsuario'
	),
)); ?>
