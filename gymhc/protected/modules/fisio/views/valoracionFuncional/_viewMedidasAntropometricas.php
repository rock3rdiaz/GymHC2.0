<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'talla',
		'peso_actual',
		'peso_saludable',
		'imc',
		'frecuencia_cardiaca_reposo',
		'frecuencia_cardiaca_maxima',
		'porc_entrenamiento1',
		'valor_porc_entrenamiento1',
		'porc_entrenamiento2',
		'valor_porc_entrenamiento2',
	),
)); ?>