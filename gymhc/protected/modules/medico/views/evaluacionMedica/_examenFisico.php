<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $examen_fisico, 'estado_general',
					array('bueno'=>'Bueno', 'regular'=>'Regular', 'malo'=>'Malo'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $examen_fisico, 'conciente',
					array('si'=>'Si', 'no'=>'No'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $examen_fisico, 'alerta',
					array('si'=>'Si', 'no'=>'No'),					
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $examen_fisico, 'hidratado',
					array('si'=>'Si', 'no'=>'No'),
					array('class'=>'span3' ) ); ?>
	</div>	
</div>

<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'cabeza',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'ojos',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'orl',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3') ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'cuello',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'cp',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'abdomen',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'osteoarticular',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3') ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'muscular',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'piel_faneras',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $caracteristicas_fisicas, 'postura',
					array('normal'=>'Normal', 'anormal'=>'Anormal'),
					array('class'=>'span3' ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'ta',
					array('class'=>'span3', 'maxlength'=>8,
						'ng-model'=>'physical_examination.ta',
						'ng-blur'=>'setImc()'  ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'fc',
					array('class'=>'span3', 'maxlength'=>8  ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'fr',
					array('class'=>'span3', 'maxlength'=>8  ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'peso',
					array('class'=>'span3', 'maxlength'=>8 ,
						'ng-model'=>'physical_examination.weight',
						'ng-blur'=>'setImc()' ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'talla',
					array('class'=>'span3', 'maxlength'=>8 ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'imc',
					array('class'=>'span3', 'maxlength'=>8,
						'ng-model'=>'physical_examination.imc') ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'peso_ideal',
					array('class'=>'span3', 'maxlength'=>8  ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $medidas_fisicas, 'gasto_basal_energia',
					array('class'=>'span3', 'maxlength'=>8  ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span12">
		<?php echo $form->textFieldRow( $examen_fisico, 'observaciones',					
					array('class'=>'span12', 'maxlength'=>100  ) ); ?>
	</div>
</div>