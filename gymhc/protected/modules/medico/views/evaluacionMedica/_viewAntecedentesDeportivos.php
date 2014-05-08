<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'practica_si_no',
		array( 'name'=>'idDeporte', 
			'value'=>$model->idDeporte0->nombre ),		
		'tipo_practica',
		'frecuencia_practica',
		'posicion_juego',
		'lateralidad',
		'observaciones'
	),
)); ?>