<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<?php echo Yii::app()->bootstrap->register();?>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<p>
  <!-- <div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?>
		</div>
	</div><!-- header -->
  <img src="images/banner_saar.jpg" width="950" height="200" /></p>
	<br />
	<div>
		<?php /*$this->widget('zii.widgets.CMenu',array(*/
			$this->widget('bootstrap.widgets.TbNavbar', array(
			'brand'=>'SAAR',
			'brandUrl'=>'#',
			'collapse'=>true, // requires bootstrap-responsive.css
			'fixed'=>'',
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'Choferes', 'url'=>array('/chofer/index'), 'items'=>array(
							array('label'=>'Registrar', 'url'=>array('/chofer/create')),
							array('label'=>'Modificar', 'url'=>array('#')),
							array('label'=>'Consultar', 'url'=>array('#')),
							array('label'=>'Eliminar', 'url'=>array('#')),
						)),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
							array('label'=>'Action', 'url'=>'#'),
							array('label'=>'Another action', 'url'=>'#'),
							array('label'=>'Something else here', 'url'=>'#'),
							'---',
							array('label'=>'NAV HEADER'),
							array('label'=>'Separated link', 'url'=>'#'),
							array('label'=>'One more separated link', 'url'=>'#'),
						)),
					),
				),
			),
		)); ?>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>''
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div id="main-content">
		<?php echo $content; ?>
	</div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
