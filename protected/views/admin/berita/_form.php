<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'berita-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($berita); ?>

	<div class="row">
		<?php echo $form->labelEx($berita,'title'); ?>
		<?php echo $form->textField($berita,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($berita,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($berita,'body'); ?>
		<?php echo $form->textArea($berita,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($berita,'body'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($berita->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
