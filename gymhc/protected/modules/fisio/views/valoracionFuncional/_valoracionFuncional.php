<div class="row">
	<div class="span6">
		<?php echo $form->dropDownListRow($model,'programa_entrenamiento',
				array( 'acondicionamiento Fisico'=>'Acondicionamiento fisico',
					'mejoramiento fisico'=>'Mejoramiento fisico',
					'mantenimiento fisico'=>'Mantenimiento fisico',
				 ),
			array( 'empty'=>'-- Seleccione una opcion --', 'class'=>'span6','maxlength'=>50)); ?>
	</div>

	<div class="span6">
		<?php echo $form->textFieldRow($model,'objetivo_ejercicio',array('class'=>'span6','maxlength'=>45)); ?>
	</div>
</div>

<div class="row">
	<div class="span12">
		<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span12','maxlength'=>3000)); ?>
	</div>
</div>