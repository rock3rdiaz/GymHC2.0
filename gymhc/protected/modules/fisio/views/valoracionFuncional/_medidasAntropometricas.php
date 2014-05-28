<div class="row">
	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'talla',
						array('class'=>'span2',
							'ng-model'=>'physical_examination.ta',
							'ng-blur'=>'setImc()')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'peso_actual',
						array('class'=>'span2',
							'ng-model'=>'physical_examination.weight',
							'ng-blur'=>'setImc()')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'peso_saludable',
						array('class'=>'span2')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'frecuencia_cardiaca_reposo',
						array('class'=>'span2',
						'ng-model'=>'medidas_antropometricas.fcr')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'frecuencia_cardiaca_maxima',
						array('class'=>'span2',
						'ng-model'=>'medidas_antropometricas.fcm')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'imc',
						array('class'=>'span2',
							'ng-model'=>'physical_examination.imc')); ?>
	</div>
</div>

<div class="row">
	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'porc_entrenamiento1',
						array('class'=>'span2',
						'ng-model'=>'medidas_antropometricas.porc_e1',
						'ng-blur'=>'setValPorc1()')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'valor_porc_entrenamiento1',
						array('class'=>'span2',
						'ng-model'=>'medidas_antropometricas.val_porc_e1')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'porc_entrenamiento2',
						array('class'=>'span2',
						'ng-model'=>'medidas_antropometricas.porc_e2',
						'ng-blur'=>'setValPorc2()')); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow($medidas_antropometricas, 'valor_porc_entrenamiento2',
						array('class'=>'span2',
						'ng-model'=>'medidas_antropometricas.val_porc_e2')); ?>
	</div>
</div>