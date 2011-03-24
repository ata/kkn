<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'dosen-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($dosen); ?>

	<div class="row">
		<?php echo $form->labelEx($dosen,'nip'); ?>
		<?php echo $form->textField($dosen,'nip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($dosen,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'namaLengkap'); ?>
		<?php echo $form->textField($dosen,'namaLengkap',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($dosen,'namaLengkap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'jenisKelamin'); ?>
		<?php echo $form->textField($dosen,'jenisKelamin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($dosen,'jenisKelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'userId'); ?>
		<?php echo $form->textField($dosen,'userId'); ?>
		<?php echo $form->error($dosen,'userId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'fakultasId'); ?>
		<?php echo $form->textField($dosen,'fakultasId'); ?>
		<?php echo $form->error($dosen,'fakultasId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'jurusanId'); ?>
		<?php echo $form->textField($dosen,'jurusanId'); ?>
		<?php echo $form->error($dosen,'jurusanId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'kontak'); ?>
		<?php echo $form->textField($dosen,'kontak',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($dosen,'kontak'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($dosen->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
