<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'fakultas-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($fakultas); ?>

	<div class="row">
		<?php echo $form->labelEx($fakultas,'nama'); ?>
		<?php echo $form->textField($fakultas,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($fakultas,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($fakultas,'kode'); ?>
		<?php echo $form->textField($fakultas,'kode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($fakultas,'kode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($fakultas->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
