<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($user); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>
	<?php if($user->isNewRecord):?>
		<div class="row">
			<?php echo $form->labelEx($user,'password'); ?>
			<?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($user,'password'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($user,'confirmPassword')?>
			<?php echo $form->passwordField($user,'confirmPassword')?>
			<?php echo $form->error($user,'confirmPassword')?>
		</div>
	<?php endif?>
	<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'nama'); ?>
		<?php echo $form->textField($user,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'role'); ?>
		<?php echo $form->textField($user,'role',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
