<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'valoracion-funcional-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary( array(
			'model'=>$model,
			'antecedentes_usuario'=>$antecedentes_usuario,
			'medidas_antropometricas'=>$medidas_antropometricas,
			'perimetro'=>$perimetro,
			'pliegue'=>$pliegue,
			'test_funcional'=>$test_funcional,
			'frecuencia_entrenamiento'=>$frecuencia_entrenamiento,
	) ); ?>

	<!-- Datos del paciente -->
	<fieldset>
		<legend>Datos del paciente</legend>
		
		<?php echo $this->renderPartial( '_datosPaciente' ); ?>
	</fieldset>	

	<!-- Datos de todo el proceso de valoracion funcional -->
	<fieldset>
		<legend>Datos generales</legend>
		
		<?php $this->widget('bootstrap.widgets.TbTabs', array(
			    'type'=>'tabs', // 'tabs' or 'pills'
			    'tabs'=>array(
			        array('label'=>'Datos generales', 'active'=>true,
			        	'content'=>$this->renderPartial(  '_valoracionFuncional', 
			        		array( 'model'=>$model, 'form'=>$form ), $this  )			        	
			        ),

			        array('label'=>'Antecedentes', 
			        	'content'=>$this->renderPartial(  '_antecedentesUsuario', 
			        		array( 'antecedentes_usuario'=>$antecedentes_usuario, 'form'=>$form ), $this  ) 
			        ),

			        array('label'=>'Medidas antropometricas', 
			        	'content'=>$this->renderPartial(  '_medidasAntropometricas', 
			        		array( 'medidas_antropometricas'=>$medidas_antropometricas, 'form'=>$form ), $this  ) 
			        ),

			        array('label'=>'Pliegues', 
			        	'content'=>$this->renderPartial(  '_pliegues', 
			        		array( 'pliegue'=>$pliegue, 'form'=>$form ), $this  ) 
			        ),

			        array('label'=>'Perimetros', 
			        	'content'=>$this->renderPartial(  '_perimetros', 
			        		array( 'perimetro'=>$perimetro, 'form'=>$form ), $this  ) 
			        ),

			        array('label'=>'Test funcional', 
			        	'content'=>$this->renderPartial(  '_testFuncionales', 
			        		array( 'test_funcional'=>$test_funcional, 'form'=>$form ), $this  ) 
			        ),

			        array('label'=>'Frecuencia entrenamiento', 
			        	'content'=>$this->renderPartial(  '_frecuenciaEntrenamiento', 
			        		array( 'frecuencia_entrenamiento'=>$frecuencia_entrenamiento, 'form'=>$form ), $this  ) 
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
		)); ?>
	</div>

<?php $this->endWidget(); ?>
