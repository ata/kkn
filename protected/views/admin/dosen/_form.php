<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'dosen-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>



	<div class="row">
		<?php echo $form->labelEx($dosen,'nip')?>
		<?php echo $form->textField($dosen,'nip')?>
		<?php echo $form->error($dosen,'nip')?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($dosen,'namaLengkap')?>
		<?php echo $form->textField($dosen,'namaLengkap')?>
		<?php echo $form->error($dosen,'namaLengkap')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'jenisKelamin')?>
		<?php echo $form->dropDownList($dosen,'jenisKelamin',array(
			Dosen::LAKI => Yii::t('app','Laki-laki'),
			Dosen::PEREMPUAN => Yii::t('app','Perempuan'),
		),array('empty'=>'Pilih Jenis Kelamin'))?>
	</diV>

	<div class="row">
		<?php echo $form->labelEx($dosen,'fakultasId'); ?>
		<?php echo $form->dropDownList($dosen,'fakultasId',Fakultas::model()->listData,array(
			'empty' => Yii::t('app','Select Fakultas'),
			'ajax' => array(
				'url' => array('dependentSelectJurusan'),
				'data' => array('fakultasId' => 'js:jQuery(this).val()'),
				'replace' => '#Dosen_jurusanId'
			)
		)); ?>
		<?php echo $form->error($dosen,'fakultasId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'jurusanId'); ?>
		<?php echo $form->dropDownList($dosen, 'jurusanId',Jurusan::model()->listData,array(
			'empty'=>Yii::t('app','Select Jurusan')))?>
		<?php echo $form->error($dosen,'jurusanId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($dosen,'kontak')?>
		<?php echo $form->textField($dosen,'kontak')?>
		<?php echo $form->error($dosen,'kontak')?>
	</div>
	<?php /*
	<div class="row">
		<?php echo $form->labelEx($user,'username')?>
		<?php echo $form->textField($user,'username')?>
		<?php echo $form->error($user,'username')?>
	</div>
	*/?>

	<div class="row">
		<?php echo $form->labelEx($user,'password')?>
		<?php echo $form->passwordField($user,'password')?>
		<?php echo $form->error($user,'password')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'confirmPassword')?>
		<?php echo $form->passwordField($user,'confirmPassword')?>
		<?php echo $form->error($user,'confirmPassword')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'email')?>
		<?php echo $form->textField($user,'email')?>
		<?php echo $form->error($user,'email')?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
