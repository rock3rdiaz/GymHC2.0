<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?//php echo $form->textFieldRow($model,'idCita',array('class'=>'span5')); ?>

	<div class="row">

		<div class="span3">
		<?php echo $form->dropDownListRow($model,'tipo',
					array( 'funcional'=>'Valoracion funcional', 'medica'=>'Evaluacion medica' ),
					array( 'empty'=>'-- Todos los registros --', 'class'=>'span3','maxlength'=>20)); ?>
		</div>

		<div class="span3">
			<?php echo $form->dropDownListRow($model,'motivo',
					array( 'ingreso'=>'Ingreso', 'control'=>'Control' ),
					array( 'empty'=>'-- Todos los registros --', 'class'=>'span3','maxlength'=>20)); ?>
		</div>

		<div class="span3">
			<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span3')); ?>
		</div>

		<div class="span3">
			<?php echo $form->textFieldRow($model,'idVUsuario',array('class'=>'span3')); ?>
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
