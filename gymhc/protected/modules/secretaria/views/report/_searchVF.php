<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl( $this->route ),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="span6">
			<?php echo $form->dropDownListRow($model,'programa_entrenamiento',
				array( 'acondicionamiento Fisico'=>'Acondicionamiento fisico',
					'mejoramiento fisico'=>'Mejoramiento fisico',
					'mantenimiento fisico'=>'Mantenimiento fisico',
				 ),
				array( 'empty'=>'-- Todos los programas --', 'class'=>'span6','maxlength'=>50)); ?>
		</div>		

		<div class="span6">
			<?php echo CHtml::label( 'Fecha' ,'fecha',array('class'=>'span6')); ?>
			<?php $this->widget(
			    'ext.datepicker.EJuiDateTimePicker',
			    array(
			    	'htmlOptions'=>array( 'class'=>'span6' ),
			        'model'     => $model,
			        'attribute' => 'fecha_hora',
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

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white search',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
