<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','User') => array('/admin/user/index'),
	$user->nama => array('/admin/user/view','id' => $user->id),
	Yii::t('app','Ubah'),
);
?>

<h2><?php echo Yii::t('app','Ubah User') ?></h2>

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>
