<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'jurusan-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>
	
	<div class="row">
		<?php echo $form->labelEx($jurusan,'nama'); ?>
		<?php echo $form->textField($jurusan,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($jurusan,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($jurusan,'kode'); ?>
		<?php echo $form->textField($jurusan,'kode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($jurusan,'kode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($jurusan,'fakultasId'); ?>
		<?php echo $form->dropDownList($jurusan,'fakultasId',Fakultas::model()->listData); ?>
		<?php echo $form->error($jurusan,'fakultasId'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($jurusan,'jenjangId'); ?>
		<?php echo $form->dropDownList($jurusan,'jenjangId',Jenjang::model()->listData); ?>
		<?php echo $form->error($jurusan,'jenjangId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($jurusan->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
