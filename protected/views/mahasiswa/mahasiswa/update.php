<?php
$this->breadcrumbs=array(
	'Mahasiswa'=>array('/user'),
	'Update',
);?>

<h2><?php echo Yii::t('app','Update Data Mahasiswa') ?></h2>

<?php if(Yii::app()->user->hasFlash('pesan')):?>
<div class="notice">
	<?php echo Yii::app()->user->getFlash('pesan'); ?>
</div>
<?php endif ?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'mahasiswa-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($mahasiswa); ?>
	<fieldset>
		<legend><?php echo Yii::t('app','Informasi Mahasiswa')?></legend>
		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'nim'); ?>
			<?php echo $form->textField($mahasiswa,'nim',array('size'=>60,'maxlength'=>255,'disabled' => 'disabled')); ?>
			<?php echo $form->error($mahasiswa,'nim'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'namaLengkap'); ?>
			<?php echo $form->textField($mahasiswa,'namaLengkap',array('size'=>60,'maxlength'=>255,'disabled' => 'disabled')); ?>
			<?php echo $form->error($mahasiswa,'namaLengkap'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'tempatLahir'); ?>
			<?php echo $form->textField($mahasiswa,'tempatLahir',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'tempatLahir'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'tanggalLahir'); ?>
			<?php //echo $form->textField($mahasiswa,'tanggalLahir',array('size'=>60,'maxlength'=>255)); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name'=>'Mahasiswa[tanggalLahir]',
				'value' => $mahasiswa->tanggalLahir,
				// additional javascript options for the date picker plugin
				'options'=>array(
					'changeYear' => true,
					'dateFormat' => 'yy-mm-dd',
					'yearRange' => 'c-30:c',
				)));?>
			<?php echo $form->error($mahasiswa,'tanggalLahir'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'alamatAsal'); ?>
			<?php echo $form->textField($mahasiswa,'alamatAsal',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'alamatAsal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'alamatTinggal'); ?>
			<?php echo $form->textField($mahasiswa,'alamatTinggal',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'alamatTinggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'jenjangId'); ?>
			<?php echo $form->dropDownList($mahasiswa, 'jenjangId',Jenjang::model()->listData,array(
				'disabled' => 'disabled',
			))?>
			<?php echo $form->error($mahasiswa,'jenjangId'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'fakultasId'); ?>
			<?php echo $form->dropDownList($mahasiswa,'fakultasId',Fakultas::model()->listData,array('disabled' => 'disabled',));?>
			<?php echo $form->error($mahasiswa,'fakultasId'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'jurusanId'); ?>
			<?php echo $form->dropDownList($mahasiswa, 'jurusanId',Jurusan::model()->listData,array('disabled' => 'disabled',))?>
			<?php echo $form->error($mahasiswa,'jurusanId'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'jenisKelamin'); ?>
			<?php echo $form->dropDownList($mahasiswa,'jenisKelamin',array(
				Mahasiswa::LAKI_LAKI => Yii::t('app','Laki-laki'),
				Mahasiswa::PEREMPUAN => Yii::t('app','Perempuan'),
			),array('disabled' => true,)); ?>
			<?php echo $form->error($mahasiswa,'jenisKelamin'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'phone1'); ?>
			<?php echo $form->textField($mahasiswa,'phone1',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'phone1'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'phone2'); ?>
			<?php echo $form->textField($mahasiswa,'phone2',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'phone2'); ?>
		</div>
	</fieldset>

	<fieldset>
		<legend><?php echo Yii::t('app','Informasi User')?></legend>
		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'email'); ?>
			<?php echo $form->textField($mahasiswa,'email',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'email'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'password'); ?>
			<?php echo $form->passwordField($mahasiswa,'password',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'password'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($mahasiswa,'confirmPassword'); ?>
			<?php echo $form->passwordField($mahasiswa,'confirmPassword',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($mahasiswa,'confirmPassword'); ?>
		</div>
	</fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
