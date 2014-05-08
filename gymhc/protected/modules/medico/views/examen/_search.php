<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="span6">			
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

		<div class="span6">			
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
