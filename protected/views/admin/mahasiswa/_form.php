<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'mahasiswa-form',
	'enableAjaxValidation' => false,
)); ?>

	<div class="row">
		<?php echo $form->label($mahasiswa,'namaLengkap'); ?>
		<?php echo $form->textField($mahasiswa,'namaLengkap',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'namaLengkap'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'nim'); ?>
		<?php echo $form->textField($mahasiswa,'nim',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'nim'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'tempatLahir'); ?>
		<?php echo $form->textField($mahasiswa,'tempatLahir',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'tempatLahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'tanggalLahir'); ?>
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
		<?php echo $form->label($mahasiswa,'alamatAsal'); ?>
		<?php echo $form->textField($mahasiswa,'alamatAsal',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'alamatAsal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'alamatTinggal'); ?>
		<?php echo $form->textField($mahasiswa,'alamatTinggal',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'alamatTinggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'fakultasId'); ?>
		<?php echo $form->dropDownList($mahasiswa,'fakultasId',Fakultas::model()->listData,array(
			'empty' => Yii::t('app','Select Fakultas'),
			'ajax' => array(
				'url' => array('dependentSelectJurusan'),
				'data' => array('fakultasId' => 'js:jQuery(this).val()'),
				'replace' => '#Mahasiswa_jurusanId'
			)
		)); ?>
		<?php echo $form->error($mahasiswa,'fakultasId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'jurusanId'); ?>
		<?php echo $form->dropDownList($mahasiswa, 'jurusanId',Jurusan::model()->listData,array('empty'=>Yii::t('ap','Select Jurusan')))?>
		<?php echo $form->error($mahasiswa,'jurusanId'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($mahasiswa,'kabupatenId'); ?>
		<?php echo $form->dropDownList($mahasiswa,'kabupatenId',Kabupaten::model()->listData,array(
			'empty' => Yii::t('app','Select Kabupaten'),
			'ajax' => array(
				'url' => array('dependentSelectKecamatan'),
				'data' => array('kabupatenId' => 'js:jQuery(this).val()'),
				'replace' => '#Mahasiswa_kecamatanId'
			)
		)); ?>
		<?php echo $form->error($mahasiswa,'kabupatenId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'kecamatanId'); ?>
		<?php echo $form->dropDownList($mahasiswa,'kecamatanId',array(),
			array(
				'empty' => Yii::t('app','Select Kecamatan'),
				'ajax' => array(
					'url' => array('dependentSelectKelompok'),
					'data' => array('kecamatanId' => 'js:jQuery(this).val()'),
					'replace' => '#Mahasiswa_kelompokId'
				),
			)); ?>
		<?php echo $form->error($mahasiswa,'kecamatanId'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($mahasiswa,'kelompokId'); ?>
		<?php echo $form->dropDownList($mahasiswa, 'kelompokId',
			array($mahasiswa->kelompokId => $mahasiswa->kelompok),
			array('empty' => Yii::t('app','Select Kelompok'), 'disabled' => 'disabled'))?>
		<?php echo $form->error($mahasiswa,'kelompokId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'jenjangId'); ?>
		<?php echo $form->dropDownList($mahasiswa, 'jenjangId',Jenjang::model()->listData)?>
		<?php echo $form->error($mahasiswa,'jenjangId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'jenisKelamin'); ?>
		<?php echo $form->dropDownList($mahasiswa,'jenisKelamin',array(
			Mahasiswa::LAKI_LAKI => Yii::t('app','Laki-laki'),
			Mahasiswa::PEREMPUAN => Yii::t('app','Perempuan'),
		)); ?>
		<?php echo $form->error($mahasiswa,'jenisKelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'phone1'); ?>
		<?php echo $form->textField($mahasiswa,'phone1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'phone1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($mahasiswa,'phone2'); ?>
		<?php echo $form->textField($mahasiswa,'phone2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'phone2'); ?>
	</div>
	<?php /*
	<div class="row">
		<?php echo $form->label($mahasiswa,'email'); ?>
		<?php echo $form->textField($mahasiswa,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($mahasiswa,'password'); ?>
		<?php echo $form->passwordField($mahasiswa,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($mahasiswa,'confirmPassword'); ?>
		<?php echo $form->passwordField($mahasiswa,'confirmPassword',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($mahasiswa,'confirmPassword'); ?>
	</div>
	*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($mahasiswa->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
