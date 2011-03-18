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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="top">
	<div class="container">
		<div class="span-12">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'htmlOptions' => array('class'=> 'breadcrumbs span-24')
			)); ?><!-- end.breadcrumbs -->
		</div>
		<div class="span-12 last ar" id="top-navigation">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items' => array(
					array('label'=>Yii::t('app','Daftar'), 'url'=>array('/dashboard/mahasiswa/register'),
						'visible' => Yii::app()->user->isGuest),
					array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'),
						'visible' => Yii::app()->user->isGuest),
					array('label'=>Yii::t('app','Administrasi'), 'url'=>array('/admin/default/index'),
						'visible' => Yii::app()->user->name === 'admin'),
					array('label'=>Yii::t('app','Dashboard'), 'url'=>array('/kelompok/view'),
						'visible' => !Yii::app()->user->isGuest && Yii::app()->user->name !== 'admin'),
					array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/logout'),
						'visible' => !Yii::app()->user->isGuest),
				 ))); ?>
			
		</div>
		
	</div>
</div>

<div id="header">
	<div class="container">
		<div class="slider-content">
			<div class="image-reel">
				<div style="position:relative;">
					<img src="<?php echo Yii::app()->request->baseUrl?>/images/slideshow1.jpg">
					<div class="slider-text1">
					<p >"Peranan orang tua sangatlah penting dalam perkembangan kecerdasan anak"</p></div>
					
					<img src="images/child-parent.jpg" 
					width="600px"/>
					<div class="slider-text2">
					<p>"Teach your child to love helping others in need"</p></div>
					
					<img src="images/cooking-kids.jpg" 
					width="600px"/>
					<div class="slider-text3">
					<p>"Tempt your picky eater to expand her taste buds"</p></div>
			   
					<img src="images/social-network.jpg" 
					width="600px"/>
					<div class="slider-text4">
					<p>"Millennial kids are hanging out in cyber-communities like Club Penguin and Webkinz"</p></div>
				</div>
				   
			</div>
			<div class="paging-image">
				<a href="#" rel="1">1</a>
				<a href="#" rel="2">2</a>
				<a href="#" rel="3">3</a>
				<a href="#" rel="4">4</a>
			</div>
		</div>
	</div>
</div>

<?php echo $content?>

<div id="footbar">
	<div class="container">
		
	</div>
</div>

<div id="footer">
	<div class="container">
		<span class="span-12 al">
			LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT<br/>
			<b>UNIVERSITAS PENDIDIKAN INDONESIA</b>
		</span>
		<span class="span-12 last ar">
			Copyright &copy; 2010 by <?php echo CHtml::link('Nevisa','http://nevisa.web.id') ?><br/>
			<?php echo Yii::powered(); ?>
		</span>
	</div>
</div><!-- end#footer-->

</body>
</html>
