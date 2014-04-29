<div class="row">			
	<div class="span2">
		<?php echo CHtml::label( 'Codigo HC', 'user_clinic_history', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_clinic_history', '', 
						array( 'ng-model'=>'user.clinic_history', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Codigo usuario', 'user_code', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_code', '', 
						array( 'ng-model'=>'user.code', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span6">
		<?php echo CHtml::label( 'Nombre completo', 'user_name', array( 'class'=>'span6' ) ) ;?>
		<?php echo CHtml::textField( 'user_name', '', 
						array( 'ng-model'=>'user.name', 'class'=>'span6', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Identificacion', 'user_identification', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_identification', '', 
						array( 'ng-model'=>'user.identification', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>
</div>

<div class="row">			
	<div class="span2">
		<?php echo CHtml::label( 'Sexo', 'user_sex', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_sex', '', 
						array( 'ng-model'=>'user.sex', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span3">
		<?php echo CHtml::label( 'Fecha nacimiento', 'user_date_of_birth', array( 'class'=>'span3' ) ) ;?>
		<?php echo CHtml::textField( 'user_date_of_birth', '', 
						array( 'ng-model'=>'user.date_of_birth', 'class'=>'span3', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span1">
		<?php echo CHtml::label( 'Edad', 'user_age', array( 'class'=>'span1' ) ) ;?>
		<?php echo CHtml::textField( 'user_age', '',
						array( 'ng-model'=>'user.age', 'class'=>'span1', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Numero celular', 'user_cell', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_cell', '', 
						array( 'ng-model'=>'user.cell', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Email', 'user_mail', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_mail', '', 
						array( 'ng-model'=>'user.mail', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Categoria', 'user_category', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_category', '', 
						array( 'ng-model'=>'user.category', 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>
</div>

<div class="row">			
	<div class="span3">
		<?php echo $form->textFieldRow( $datos_extra_usuario, 'lugar_nacimiento',
						array('class'=>'span3','maxlength'=>20, 
						'ng-model'=>'user.birth_place' ) ); ?>
	</div>

	<div class="span2">
		<?php echo $form->textFieldRow( $datos_extra_usuario, 'estado_civil',
						array('class'=>'span2','maxlength'=>15, 
						'ng-model'=>'user.marital_status' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $datos_extra_usuario, 'ocupacion',
						array('class'=>'span3','maxlength'=>45, 
						'ng-model'=>'user.ocuppation' ) ); ?>
	</div>

	<div class="span2">
		<?php echo $form->dropDownListRow( $datos_extra_usuario, 'idEPS',
						CHTml::listData( $listado_eps, 'idEPS', 'nombre' ),
						array('class'=>'span2',
						'ng-model'=>'user.eps_code' ) ); ?>
	</div>

	<div class="span2">
		<?php echo $form->dropDownListRow( $datos_extra_usuario, 'tipo_aporte',
						array( 'beneficiario'=>'Beneficiario', 'cotizante'=>'Cotizante' ),
						array('class'=>'span2','maxlength'=>15, 
						'ng-model'=>'user.kind_contribution' ) ); ?>
	</div>
</div>

<div class="row">	
	<div class="span3">
				<?php echo $form->textFieldRow( $datos_extra_usuario, 'acompaniante',
						array('class'=>'span3','maxlength'=>40, 
						'ng-model'=>'user.companion' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $datos_extra_usuario, 'parentezco_acompaniante',
						array('class'=>'span3','maxlength'=>45, 
						'ng-model'=>'user.companion_relationship' ) ); ?>
	</div>
</div>