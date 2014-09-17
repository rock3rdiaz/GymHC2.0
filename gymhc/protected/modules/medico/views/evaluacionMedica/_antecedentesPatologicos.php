<div class="row">
	<div class="span4">
		<?php echo $form->dropDownListRow( $antecedentes_patologicos, 'habito',
					array('tabaquismo'=>'Tabaquismo', 'licor'=>'Licor', 'ninguno'=>'Ninguno', 'ambos'=>'Ambos'),				
					array('class'=>'span4') ); ?>
	</div>

	<div class="span4">
		<?php echo $form->textFieldRow( $antecedentes_patologicos, 'medicacion_actual',					
					array('class'=>'span4', 'maxlength'=>60 ) ); ?>
	</div>

	<div class="span4">
		<?php echo $form->textFieldRow( $antecedentes_patologicos, 'antecedentes_importantes',					
					array('class'=>'span4', 'maxlength'=>100 ) ); ?>
	</div>
</div>