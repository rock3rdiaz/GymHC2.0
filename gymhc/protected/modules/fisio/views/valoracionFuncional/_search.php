<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?//php echo $form->textFieldRow($model,'idValoracion_funcional',array('class'=>'span5')); ?>

	<div class="row">
		<div class="span3">
			<?php echo $form->dropDownListRow($model,'programa_entrenamiento',
				array( 'acondicionamiento Fisico'=>'Acondicionamiento fisico',
					'mejoramiento fisico'=>'Mejoramiento fisico',
					'mantenimiento fisico'=>'Mantenimiento fisico',
				 ),
				array( 'empty'=>'-- Todos los programas --', 'class'=>'span3','maxlength'=>50)); ?>
		</div>

		<div class="span3">
			<?php echo $form->textFieldRow($model,'objetivo_ejercicio',array('class'=>'span3','maxlength'=>45)); ?>
		</div>

		<div class="span3">
			<?php echo $form->textFieldRow($model,'fecha_hora',array('class'=>'span3')); ?>
		</div>
		
		<div class="span3">
			<?php echo $form->textFieldRow($model,'idHistoria_GYM',array('class'=>'span3')); ?>
		</div>	
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white search',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
