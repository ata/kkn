<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Dosen') => array('/admin/dosen/index'),
	$dosen->nama => array('/admin/dosen/view','id' => $dosen->id),
	Yii::t('app','Ubah'),
);
?>

<h2><?php echo Yii::t('app','Ubah Dosen') ?></h2>


<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'dosen-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($dosen); ?>
 	
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
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($dosen->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
