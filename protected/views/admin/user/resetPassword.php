<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','User') => array('/admin/user/index'),
	$user->nama,
	Yii::t('app','Ubah Sandi'),
);
?>
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'user-form',
		'enableAjaxValidation' => true,
	)); ?>
	
	<?php echo $form->errorSummary($user); ?>
	
	<div class="row">
		<?php echo $form->labelEx($user,'password')?>
		<?php echo $form->passwordField($user,'password',array('value'=>''))?>
		<?php echo $form->error($user,'password')?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user,'confirmPassword')?>
		<?php echo $form->passwordField($user,'confirmPassword')?>
		<?php echo $form->error($user,'confirmPassword')?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Reset')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>
	
	<?php $this->endWidget();?>
</div>
