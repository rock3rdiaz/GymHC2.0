<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
		'brandUrl'=>array( $this->brand_url_menu ),//URL por defecto	
		'brand'=>$this->menu_title,//Titulo de cada modulo	
	    'items'=>array(
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'items'=>$this->menu_items//Menu personalizado por cada modulo
	        ),

	        array(
            	'class'=>'bootstrap.widgets.TbMenu',
            	'htmlOptions'=>array('class'=>'pull-right'),
            	'items'=>array(
                	array('label'=>'Salir', 'url'=>'#',
                		'items'=>array(
                			array('label'=>'Cerrar sesion', 'url'=>array('/site/logout'))
                		)
                	)),
                ),
            ) 
	)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Comfenalco Qu&iacute;ndio.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
