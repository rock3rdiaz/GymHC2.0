<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'examen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<div class="span8">
			<?php echo $form->dropDownListRow( $model, 'idEvaluacion_medica',
				CHtml::listData( $em, 'idEvaluacion_medica', function( $i ){

						return 'Codigo EM: ' . $i->primaryKey . ', Fecha EM: ' . Yii::app()->format->formatDateTime( $i->fecha_hora ) . 
							', Paciente: ' . $i->idHistoriaGYM->idusuario0->getFullName();
					} ),
				array( 'class'=>'span8' ) )?>
		</div>

		<div class="span4">
			<?php echo CHtml::label( 'Fecha realizacion' ,'fecha',array('class'=>'span4')); ?>
			<?php $this->widget(
			    'ext.datepicker.EJuiDateTimePicker',
			    array(
			    	'htmlOptions'=>array( 'class'=>'span4' ),
			        'model'     => $model,
			        'attribute' => 'fecha_realizacion',
			        //'language'=> 'ru',//default Yii::app()->language
			        'mode'    => 'date',//'datetime' or 'time' ('datetime' default)
			        'options'   => array(
			            'dateFormat' => 'yy-mm-dd',
			            'timeFormat' => 'hh:mm',//'hh:mm tt' default
			        ),
			    )			    
			); ?>
		</div>

	</div>

	<div class="row">
		
		<div class="span12">
			<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span12','maxlength'=>100)); ?>
		</div>

	</div>

	<div class="row">

		<div class="span4">
			<?php echo CHtml::label( 'Fecha expedicion' ,'fecha',array('class'=>'span4')); ?>
			<?php $this->widget(
			    'ext.datepicker.EJuiDateTimePicker',
			    array(
			    	'htmlOptions'=>array( 'class'=>'span4' ),
			        'model'     => $model,
			        'attribute' => 'fecha_expedicion',
			        //'language'=> 'ru',//default Yii::app()->language
			        'mode'    => 'date',//'datetime' or 'time' ('datetime' default)
			        'options'   => array(
			            'dateFormat' => 'yy-mm-dd',
			            'timeFormat' => 'hh:mm',//'hh:mm tt' default
			        ),
			    )			    
			); ?>
		</div>
		
		<div class="span8">
			<?php echo $form->textFieldRow($model,'resultado',array('class'=>'span8','maxlength'=>100)); ?>
		</div>		

	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'white download-alt',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',		
		)); ?>
	</div>

<?php $this->endWidget(); ?>
