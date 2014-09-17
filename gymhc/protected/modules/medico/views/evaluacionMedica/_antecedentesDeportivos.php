<div class="row">
	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_deportivos, 'practica_si_no',
					array( 'si'=>'Si', 'no'=>'No' ),
					array('class'=>'span3', 'ng-model'=>'sports_history.yes_no',
						'ng-change'=>'validateSportsHistory()' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_deportivos, 'idDeporte',
					CHTml::listData( $listado_deportes, 'idDeporte', 'nombre' ),
					array('class'=>'span3', 'ng-disabled'=>'validateSportsHistory()' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_deportivos, 'tipo_practica',
					array( 'aficionado'=>'Aficionado', 'profesional'=>'Profesional', 'recreativo'=>'Recreativo' ),
					array('class'=>'span3', 'ng-disabled'=>'validateSportsHistory()' ) ); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow( $antecedentes_deportivos, 'frecuencia_practica',
					array('diaria'=>'Diaria', 'dos semana'=>'Dos/Sem', 
						'tres semana'=>'Tres/Sem', 'semanal'=>'Semanal', 
						'quincenal'=>'Quincenal', 'mes'=>'Mensual'),
					array('class'=>'span3', 'ng-disabled'=>'validateSportsHistory()' ) ); ?>
	</div>
</div>

<div class="row">
	<div class="span2">
		<?php echo $form->textFieldRow( $antecedentes_deportivos, 'posicion_juego',					
					array('class'=>'span2', 'maxlength'=>20, 'ng-disabled'=>'validateSportsHistory()' ) ); ?>
	</div>

	<div class="span2">
		<?php echo $form->dropDownListRow( $antecedentes_deportivos, 'lateralidad',	
					array('derecha'=>'Derecha', 'izquierda'=>'Izquierda', 'ambas'=>'Ambas'),				
					array('class'=>'span2' ) ); ?>
	</div>

	<div class="span8">
		<?php echo $form->textFieldRow( $antecedentes_deportivos, 'observaciones',					
					array('class'=>'span8', 'maxlength'=>100 ) ); ?>
	</div>	
</div>