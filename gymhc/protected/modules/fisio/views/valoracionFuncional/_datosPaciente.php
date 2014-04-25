<div class="row">			
	<div class="span2">
		<?php echo CHtml::label( 'Codigo', 'user_code', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_code', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span8">
		<?php echo CHtml::label( 'Nombre completo', 'user_name', array( 'class'=>'span8' ) ) ;?>
		<?php echo CHtml::textField( 'user_name', '', array( 'class'=>'span8', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Identificacion', 'user_identification', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_sex', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>
</div>

<div class="row">			
	<div class="span2">
		<?php echo CHtml::label( 'Sexo', 'user_sex', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_sex', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Fecha nacimiento', 'user_date_of_birth', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_date_of_birth', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Edad', 'user_age', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_age', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Numero celular', 'user_cell', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_cell', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Email', 'user_mail', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_mail', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>

	<div class="span2">
		<?php echo CHtml::label( 'Categoria', 'user_category', array( 'class'=>'span2' ) ) ;?>
		<?php echo CHtml::textField( 'user_category', '', array( 'class'=>'span2', 'disabled'=>true ) ) ;?>
	</div>
</div>
