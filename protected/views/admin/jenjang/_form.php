<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'jenjang-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<div class="row">
		<?php echo $form->labelEx($jenjang,'nama'); ?>
		<?php echo $form->textField($jenjang,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($jenjang,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($jenjang,'kode'); ?>
		<?php echo $form->textField($jenjang,'kode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($jenjang,'kode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($jenjang->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
