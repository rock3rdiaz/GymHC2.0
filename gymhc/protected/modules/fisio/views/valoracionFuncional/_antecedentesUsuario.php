<div class="row">
	<div class="span6">
		<?php echo $form->textFieldRow($antecedentes_usuario, 'postura', array('class'=>'span6','maxlength'=>45)); ?>
	</div>

	<div class="span6">
		<?php echo $form->dropDownListRow($antecedentes_usuario, 'estabilidad_core',
						array('bajo'=>'Baja', 'regular'=>'Regular', 'buena'=>'Buena', 'excelente'=>'Excelente'),
						array('class'=>'span6','maxlength'=>45)); ?>
	</div>
</div>