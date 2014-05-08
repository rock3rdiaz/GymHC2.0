<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'riesgo_cardiovascular',
		'riesgo_osteomuscular',		
		'peso',
		'conducta',
		'observaciones',
		'recomendaciones_nutricionales',
		'tipo_actividad_fisica',
		'justificacion_actividad_fisica'
	),
)); ?>