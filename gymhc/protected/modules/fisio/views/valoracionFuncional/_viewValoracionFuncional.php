<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idHistoria_GYM',
		'idValoracion_funcional',
		array( 'name'=>'idVUsuario', 'label'=>'Paciente',
			'value'=>ucfirst( $model->idHistoriaGYM->idusuario0->getFullName() ) ),
		array( 'name'=>'idVUsuario', 'label'=>'Identificacion paciente',
			'value'=>$model->idHistoriaGYM->idusuario0->identificacion ),
		array( 'name'=>'idVUsuario', 'label'=>'Codigo paciente',
			'value'=>$model->idHistoriaGYM->idusuario0->id_usuarios ),
		'objetivo_ejercicio',
		'observaciones',
		'fecha_hora',
		'programa_entrenamiento',
	),
)); ?>