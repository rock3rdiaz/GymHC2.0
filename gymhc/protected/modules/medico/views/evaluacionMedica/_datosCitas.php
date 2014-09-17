<div class="row">			
	<div class="span6">
		<?php echo CHtml::label( 'Citas para hoy', 'appoinments_today', array( 'class'=>'span6' ) ) ;?>
		<?php echo CHtml::dropDownList( 'appoinments_today', '', 
						$citas_programadas,
						array( 'empty'=>'-- Seleccione el paciente a atender --', 'class'=>'span6',
							'ng-model'=>'appointment.id',
							'ng-change'=>'updateUserData()' ) ) ;?>
	</div>
	
	<div class="span3">
		<?php echo CHtml::label( 'Motivo', 'reason', array( 'class'=>'span3' ) ) ;?>
		<?php echo CHtml::textField( 'reason', '',  
						array( 'class'=>'span3', 'disabled'=>true, 'ng-model'=>'appointment.reason' ) ) ;?>
	</div>

	<div class="span3">
		<?php echo CHtml::label( 'Fecha y hora', 'date_time', array( 'class'=>'span3' ) ) ;?>
		<?php echo CHtml::textField( 'date_time', '',  
						array( 'class'=>'span3', 'disabled'=>true, 'ng-model'=>'appointment.datetime' ) ) ;?>
	</div>
</div>