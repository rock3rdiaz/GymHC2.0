<?php
$this->breadcrumbs=array(
	'Mis valoraciones funcionales'=>array('admin'),
	$model->idValoracion_funcional,
);

/*$this->menu=array(
	array('label'=>'List ValoracionFuncional','url'=>array('index')),
	array('label'=>'Create ValoracionFuncional','url'=>array('create')),
	array('label'=>'Update ValoracionFuncional','url'=>array('update','id'=>$model->idValoracion_funcional)),
	array('label'=>'Delete ValoracionFuncional','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idValoracion_funcional),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ValoracionFuncional','url'=>array('admin')),
);*/
?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
       	),
)); ?>

<h1 class="titles">Detalles de la valoracion funcional No. <?php echo $model->idValoracion_funcional; ?></h1>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
				    'type'=>'tabs', // 'tabs' or 'pills'
				    'tabs'=>array(
				        array('label'=>'Datos generales', 'active'=>true,
				        	'content'=>$this->renderPartial(  '_viewValoracionFuncional', 
				        		array( 'model'=>$model ), $this  )			        	
				        ),

				        array('label'=>'Antecedentes', 
				        	'content'=>$this->renderPartial(  '_viewAntecedentesUsuario', 
				        		array( 'model'=>$model->antecedentesUsuarios[0] ), $this  ) 
				        ),

				        array('label'=>'Medidas antropometricas', 
				        	'content'=>$this->renderPartial(  '_viewMedidasAntropometricas', 
				        		array( 'model'=>$model->medidasAntropometricases[0] ), $this  ) 
				        ),

				        array('label'=>'Pliegues', 
				        	'content'=>$this->renderPartial(  '_viewPliegues', 
				        		array( 'model'=>$model->pliegues[0] ), $this  ) 
				        ),

				        array('label'=>'Perimetros', 
				        	'content'=>$this->renderPartial(  '_viewPerimetros', 
				        		array( 'model'=>$model->perimetros[0] ), $this  ) 
				        ),

				        array('label'=>'Test funcional', 
				        	'content'=>$this->renderPartial(  '_viewTestFuncionales', 
				        		array( 'model'=>$model->testFuncionals[0] ), $this  ) 
				        ),

				        array('label'=>'Frecuencia entrenamiento', 
				        	'content'=>$this->renderPartial(  '_viewFrecuenciaEntrenamiento', 
				        		array( 'model'=>$model->frecuenciaEntrenamientos[0] ), $this  ) 
				        ),
				    ),
)); ?>


