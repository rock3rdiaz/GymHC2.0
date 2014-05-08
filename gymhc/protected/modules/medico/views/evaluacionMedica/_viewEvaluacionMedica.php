<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idHistoria_GYM',
		'idEvaluacion_medica',
		array( 'name'=>'idVUsuario', 'label'=>'Paciente',
			'value'=>ucfirst( $model->idHistoriaGYM->idusuario0->getFullName() ) ),
		array( 'name'=>'idVUsuario', 'label'=>'Identificacion paciente',
			'value'=>$model->idHistoriaGYM->idusuario0->identificacion ),
		array( 'name'=>'idVUsuario', 'label'=>'Codigo paciente',
			'value'=>$model->idHistoriaGYM->idusuario0->id_usuarios ),
		'fecha_hora:datetime:Fecha hora',
		'enfermedad_actual',
	),
)); ?>