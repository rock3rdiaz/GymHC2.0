<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCita')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCita),array('view','id'=>$data->idCita)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo')); ?>:</b>
	<?php echo CHtml::encode($data->motivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Empleado_idEmpleado')); ?>:</b>
	<?php echo CHtml::encode($data->Empleado_idEmpleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idVUsuario); ?>
	<br />


</div>