<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','User') => array('/admin/user/index'),
	Yii::t('app','Tambah'),
);
?>

<h2><?php echo Yii::t('app','Tambah User') ?></h2>

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>
