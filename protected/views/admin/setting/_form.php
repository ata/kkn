<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'setting-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>


	<div class="row">
		<?php echo $form->labelEx($setting,'key'); ?>
		<?php echo $form->textField($setting,'key',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($setting,'key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($setting,'value'); ?>
		<?php echo $form->textField($setting,'value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($setting,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($setting->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
