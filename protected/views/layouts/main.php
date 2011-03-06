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
        <div class="header span-24">
            <div class="span-2">
                <img id="logo" src="<?php echo Yii::app()->request->baseUrl?>/images/logo-small.gif">
            </div>

            <div class="span-10">
                <div id="web-name">
                    <h5><?php echo Yii::t('app','LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT')?></h5>
                    <h3><?php echo Yii::t('app','UNIVERSITAS PENDIDIKAN INDONESIA')?></h3>
                </div>
            </div>
            <div class="span-12 ar last" id="head-navigation">
                <?php $this->widget('HeadMenu'); ?>
            </div><!--end.top-navigation-->
        </div><!-- end.header -->
    </div>
</div>

<?php echo $content?>

<div id="footer">
    <div class="container">
        <span class="span-12 al">
            <?php echo Yii::powered(); ?>
        </span>
        <span class="span-12 last ar">
            Copyright &copy; 2010 by <?php echo CHtml::link('Nevisa','http://nevisa.web.id') ?>
        </span>
    </div>
</div><!-- end#footer-->

</body>
</html>
