<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'kecamatan-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($kecamatan); ?>

	<div class="row">
		<?php echo $form->labelEx($kecamatan,'nama'); ?>
		<?php echo $form->textField($kecamatan,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($kecamatan,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($kecamatan,'kabupatenId'); ?>
		<?php echo $form->dropDownList($kecamatan,'kabupatenId',Kabupaten::model()->listData); ?>
		<?php echo $form->error($kecamatan,'kabupatenId'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($kecamatan,'programKknId'); ?>
		<?php echo $form->dropDownList($kecamatan,'programKknId',ProgramKkn::model()->listData,array('empty' => Yii::t('app','Pilih Program'))) ?>
		<?php echo $form->error($kecamatan,'programKknId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($kecamatan->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
