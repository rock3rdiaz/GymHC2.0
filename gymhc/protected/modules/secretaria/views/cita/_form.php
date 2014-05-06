<div ng-app='gymhc'>
	
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'cita-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=>array( 'ng-controller'=>'citaController' ),
	)); ?>

		<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">		

			<div class="span3">				
				<?php echo $form->textFieldRow( $usuario, 'identificacion', 
						array( 'class'=>'span2', 'ng-model'=>'user.identification' )); ?>

				<?php $this->widget('bootstrap.widgets.TbButton', 
						array('buttonType'=>'button', 'icon'=>'white search',
							'type'=>'info',
							'htmlOptions'=>array( 'rel'=>'tooltip', 'title'=>'Buscar usuario',
										'ng-click'=>'searchUser()' ))); ?>
			</div>

			<div class="span5">				
				<?php echo $form->textFieldRow( $usuario, 'primer_nombre',
						array('class'=>'span5', 'disabled'=>true, 'ng-model'=>'user.full_name')); ?>
			</div>

			<div class="span4">
				<?php echo $form->dropDownListRow($model,'tipo',
						array( 'funcional'=>'Valoracion funcional', 'medica'=>'Evaluacion medica' ),
						array( 'class'=>'span4','maxlength'=>20)); ?>
			</div>

		</div>

		<div class="row">

			<div class="span4">
				<?php echo $form->dropDownListRow($model,'motivo',
						array( 'ingreso'=>'Ingreso', 'control'=>'Control' ),
						array( 'class'=>'span4','maxlength'=>20)); ?>
			</div>
			
			<div class="span4">
				<?php echo CHtml::label( 'Fecha' ,'fecha',array('class'=>'span4')); ?>
				<?php $this->widget(
				    'ext.datepicker.EJuiDateTimePicker',
				    array(
				    	'htmlOptions'=>array( 'class'=>'span4' ),
				        'model'     => $model,
				        'attribute' => 'fecha',
				        //'language'=> 'ru',//default Yii::app()->language
				        //'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
				        'options'   => array(
				            'dateFormat' => 'yy-mm-dd',
				            'timeFormat' => 'hh:mm',//'hh:mm tt' default
				        ),
				    )			    
				); ?>
			</div>

			<div class="span4">
				<?php echo $form->dropDownListRow($model,'Empleado_idEmpleado',
								CHtml::listData( $listado_empleados_habiles, 'idEmpleado', 
									function( $e ){ return $e->getFullName(); } ),
								array('class'=>'span4')); ?>
			</div>

		</div>

		<?php echo $form->hiddenField( $model, 'idVUsuario',
						array('class'=>'span5', 'ng-value'=>'user.user_code' )); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'icon'=>'white download-alt',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
			)); ?>
		</div>

	<?php $this->endWidget(); ?>

</div>

<?php Yii::app()->getClientScript()
			->registerScriptFile(Yii::app()->baseUrl . '/js/app/controllers/citaController.js', CClientScript::POS_END)
?>
