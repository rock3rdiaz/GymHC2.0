<div ng-app='gymhc'>

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'evaluacion-medica-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array( 'ng-controller'=>'evaluacionMedicaController' )
	)); ?>

		<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

		<?php echo $form->errorSummary( array(
				$model,
				$examen_fisico,
				$impresion_diagnostica,
				$medidas_fisicas,
				$caracteristicas_fisicas,
				$antecedentes_deportivos,
				$antecedentes_ginecobstetricos,
				$antecedentes_trauma_lesion,
				$datos_extra_usuario,
				$antecedentes_patologicos,
		) ); ?>

		<fieldset>
			<legend>Citas programada para el dia de hoy</legend>

			<?php echo $this->renderPartial( '_datosCitas', array( 'citas_programadas'=>$citas_programadas, ) ); ?>
		</fieldset>

		<!-- Datos del paciente -->
		<fieldset>
			<legend>Datos del paciente</legend>
			
			<?php echo $this->renderPartial( '_datosPaciente', 
							array( 'form'=>$form, 
							'datos_extra_usuario'=>$datos_extra_usuario,
							'listado_eps'=>$listado_eps, ), $this ); ?>
		</fieldset>	

		<!-- Datos de todo el proceso de evaluacion medica -->
		<fieldset>
			<legend>Datos generales</legend>
			
			<?php $this->widget('bootstrap.widgets.TbTabs', array(
				    'type'=>'tabs', // 'tabs' or 'pills'
				    'tabs'=>array(
				        array('label'=>'Datos generales', 'active'=>true,
				        	'content'=>$this->renderPartial(  '_evaluacionMedica', 
				        		array( 'model'=>$model, 'form'=>$form ), $this  )			        	
				        ),

				        array('label'=>'Antecedentes deportivos',
				        	'content'=>$this->renderPartial(  '_antecedentesDeportivos', 
				        		array( 'antecedentes_deportivos'=>$antecedentes_deportivos,
				        				'listado_deportes'=>$listado_deportes,
				        			 	'form'=>$form ), $this  )			        	
				        ),

				        array('label'=>'Antecedentes de trauma y lesiones',
				        	'content'=>$this->renderPartial(  '_antecedentesTraumaLesion', 
				        		array( 'antecedentes_trauma_lesion'=>$antecedentes_trauma_lesion,				        				
				        			 	'form'=>$form ), $this  )			        	
				        ),

				        array('label'=>'Impresion diagnostica',
				        	'content'=>$this->renderPartial(  '_impresionDiagnostica', 
				        		array( 'impresion_diagnostica'=>$impresion_diagnostica,				        				
				        			 	'form'=>$form ), $this  )			        	
				        ),

				        array('label'=>'Examen fisico',
				        	'content'=>$this->renderPartial(  '_examenFisico', 
				        		array( 'examen_fisico'=>$examen_fisico,
				        				'medidas_fisicas'=>$medidas_fisicas,
				        				'caracteristicas_fisicas'=>$caracteristicas_fisicas,			        				
				        			 	'form'=>$form ), $this  )			        	
				        ),

				        array('label'=>'Antecedentes patologicos',
				        	'content'=>$this->renderPartial(  '_antecedentesPatologicos', 
				        		array( 'antecedentes_patologicos'=>$antecedentes_patologicos,				        							        				
				        			 	'form'=>$form ), $this  )			        	
				        ),
				    ),
			)); ?>

		</fieldset>			

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'icon'=>'white download-alt',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
				'htmlOptions'=>array( 'ng-click'=>'enabledData()' ),
			)); ?>
		</div>

	<?php $this->endWidget(); ?>

</div>

<?php Yii::app()->getClientScript()
			->registerScriptFile(Yii::app()->baseUrl . '/js/controllers/evaluacionMedicaController.js', CClientScript::POS_END)
?>
