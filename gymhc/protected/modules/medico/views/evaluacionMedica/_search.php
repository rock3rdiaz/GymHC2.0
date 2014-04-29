<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?//php echo $form->textFieldRow($model,'idEvaluacion_medica',array('class'=>'span5')); ?>
	
	<div class="row">
		
		<div class="span4">
			<?php echo $form->textFieldRow($model,'idHistoria_GYM',array('class'=>'span4')); ?>
		</div>

		<div class="span4">
			<?php echo $form->textFieldRow($model,'enfermedad_actual',array('class'=>'span4','maxlength'=>45)); ?>
		</div>

		<div class="span4">
			<?php echo $form->textFieldRow($model,'fecha_hora',array('class'=>'span4')); ?>
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
