<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_ginecobstetricos, 'aplica_si_no',
					array( 'si'=>'Si', 'no'=>'No' ),
					array('class'=>'span3', 'ng-model'=>'reporoductive_background.yes_no', 
						'ng-change'=>'validateReproductiveBackground()' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_ginecobstetricos, 'ciclo',
					array('regular'=>'Regulares', 'irregular'=>'Irregular', 'dismenorrea'=>'Dismenorreas'),
					array('class'=>'span3', 'ng-disabled'=>'validateReproductiveBackground()' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_ginecobstetricos, 'pf',
					array( 'no aplica'=>'No aplica', 'aco'=>'A.C.O', 'inyectable'=>'Inyectables Mes/Trimestral',
							'diu'=>'DIU', 'preservativos'=>'Preservativos'),
					array('class'=>'span3', 'ng-disabled'=>'validateReproductiveBackground()' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->textFieldRow( $antecedentes_ginecobstetricos, 'menarquia',					
					array('class'=>'span3', 'ng-disabled'=>'validateReproductiveBackground()' ) ); ?>
	</div>	
</div>

<div class="row">
	<div class="span12">
		<?php echo $form->textFieldRow( $antecedentes_ginecobstetricos, 'otros',					
					array('class'=>'span12', 'maxlength'=>45, 'ng-disabled'=>'validateReproductiveBackground()' ) ); ?>
	</div>	
</div>
