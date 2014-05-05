<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cita-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">

		<div class="span4">
			<?php echo $form->textFieldRow($model,'idVUsuario',array('class'=>'span4')); ?>
		</div>

		<div class="span4">
			<?php echo $form->dropDownListRow($model,'tipo',
					array( 'funcional'=>'Valoracion funcional', 'medica'=>'Evaluacion medica' ),
					array( 'class'=>'span4','maxlength'=>20)); ?>
		</div>

		<div class="span4">
			<?php echo $form->dropDownListRow($model,'motivo',
					array( 'ingreso'=>'Ingreso', 'control'=>'Control' ),
					array( 'class'=>'span4','maxlength'=>20)); ?>
		</div>

	</div>

	<div class="row">
		
		<div class="span4">
			<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span4')); ?>
		</div>

		<div class="span4">
			<?php echo $form->dropDownListRow($model,'Empleado_idEmpleado',
							CHtml::listData( $listado_empleados_habiles, 'idEmpleado', 
								function( $e ){ return $e->getFullName(); } ),
							array('class'=>'span4')); ?>
		</div>

	</div>

	<?//php echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>15)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'white download-alt',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>