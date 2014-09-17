<div class="row">
	<div class="span2">
		<?php echo $form->textFieldRow($frecuencia_entrenamiento, 'sesiones_semana',
						array('class'=>'span2')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($frecuencia_entrenamiento, 'tiempo_entrenamiento',
						array('class'=>'span2')); ?>
	</div>

	<div class="span8">
		<?php echo $form->textFieldRow($frecuencia_entrenamiento, 'habitos_nutricionales',
						array('class'=>'span8', 'maxlength'=>100)); ?>
	</div>
</div>