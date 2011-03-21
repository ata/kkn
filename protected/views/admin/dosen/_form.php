<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dosen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'namaLengkap'); ?>
		<?php echo $form->textField($model,'namaLengkap',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'namaLengkap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenisKelamin'); ?>
		<?php echo $form->textField($model,'jenisKelamin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jenisKelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userId'); ?>
		<?php echo $form->textField($model,'userId'); ?>
		<?php echo $form->error($model,'userId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fakultasId'); ?>
		<?php echo $form->textField($model,'fakultasId'); ?>
		<?php echo $form->error($model,'fakultasId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jurusanId'); ?>
		<?php echo $form->textField($model,'jurusanId'); ?>
		<?php echo $form->error($model,'jurusanId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kontak'); ?>
		<?php echo $form->textField($model,'kontak',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kontak'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->