<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $impresion_diagnostica, 'riesgo_cardiovascular',
					array('leve'=>'Leve/Bajo', 'moderado'=>'Moderado', 'severo'=>'Severo', 'alto'=>'Muy alto'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $impresion_diagnostica, 'riesgo_osteomuscular',
					array('no'=>'Negativo', 'si'=>'Positivo', 'otro'=>'Otro'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $impresion_diagnostica, 'conducta',					
					array('class'=>'span3', 'maxlength'=>100 ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $impresion_diagnostica, 'peso',
					array('bajo'=>'Bajo (IMC < 18,5)', 'normal'=>'Normal (IMC 18,5 - 24,9)', 
							'sobrepeso'=>'Sobrepeso (IMC 25 - 29,9)',
                           	'obesidad e1'=>'Obesidad E1 (IMC 30 - 34,9)', 
                            'obesidad e2'=>'Obesidad E2 (IMC 34 - 39,9)', 
                            'obesidad e3'=>'Obesidad E3 (IMC > 40)'),
					array('class'=>'span3' ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $impresion_diagnostica, 'tipo_actividad_fisica',	
					array('libre'=>'Sin restriccion', 'restrictiva'=>'Con restriccion'),				
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $impresion_diagnostica, 'justificacion_actividad_fisica',					
					array('class'=>'span3', 'maxlength'=>100 ) ); ?>
	</div>	

	<div class="span3">
		<?php echo $form->textFieldRow( $impresion_diagnostica, 'recomendaciones_nutricionales',					
					array('class'=>'span3', 'maxlength'=>100 ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $impresion_diagnostica, 'observaciones',					
					array('class'=>'span3', 'maxlength'=>65 ) ); ?>
	</div>	
</div>