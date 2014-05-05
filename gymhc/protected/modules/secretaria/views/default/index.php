<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h3>Bienvenido(a) <em><?php echo strtoupper( $empleado->getFullName() ); ?></em></h3>