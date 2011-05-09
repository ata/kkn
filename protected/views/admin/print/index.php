<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Cetak'),
);
?>

<h2><?php echo Yii::t('app','Cetak Daftar Peserta Jurusan') ?></h2>

<div class="form">
	<h3><?php echo Yii::t('app','Berdasarkan Kelompok')?></h3>
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'kelompok-print-form',
		'enableAjaxValidation' => true,
		'action' => array('kelompok'),
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'afterValidate'=>'js:function(form,data,hasError){
				if (!hasError) {
					var kelompokId = jQuery("#PrintKelompokForm_kelompokId").val();
					var data;
					if(kelompokId){
						console.log("berisi");
						data = "&kelompokId=" + kelompokId;
					} else {
						console.log("kosong");
						data = "&kecamatanId="+ jQuery("#PrintKelompokForm_kecamatanId").val()
					}
					window.open("'.$this->createUrl('kelompok').'" + data,
						"Cetak","menubar=no,scrollbars=yes, width=950,height=800");
				}
			}'
		),
	)); ?>


	<div class="row">
		<?php echo $form->labelEx($printKelompokForm,'kabupatenId'); ?>
		<?php echo $form->dropDownList($printKelompokForm,'kabupatenId',Kabupaten::model()->listData,array(
			'empty' => Yii::t('app','Select Kabupaten'),
			'ajax' => array(
				'url' => array('dependentSelectKecamatan'),
				'data' => array('kabupatenId' => 'js:jQuery(this).val()'),
				'replace' => '#PrintKelompokForm_kecamatanId'
			)
		)); ?>
		<?php echo $form->error($printKelompokForm,'kabupatenId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($printKelompokForm,'kecamatanId'); ?>
		<?php echo $form->dropDownList($printKelompokForm,'kecamatanId',array(),
			array(
				'empty' => Yii::t('app','Select Kecamatan'),
				'ajax' => array(
					'url' => array('dependentSelectKelompok'),
					'data' => array('kecamatanId' => 'js:jQuery(this).val()'),
					'replace' => '#PrintKelompokForm_kelompokId'
				),
			)); ?>
		<?php echo $form->error($printKelompokForm,'kecamatanId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($printKelompokForm,'kelompokId'); ?>
		<?php echo $form->dropDownList($printKelompokForm,'kelompokId',array('1' => '2'),array('empty' => Yii::t('app','Select Kelompok'))); ?>
		<?php echo $form->error($printKelompokForm,'kelompokId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Cetak')); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>

<br/>
<div class="form">
	<h3><?php echo Yii::t('app','Berdasarkan Jurusan')?></h3>
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'jurusan-print-form',
		'enableAjaxValidation' => true,
		'action' => array('jurusan'),
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'afterValidate'=>'js:function(form,data,hasError){
				if (!hasError) {
					window.open("'.$this->createUrl('jurusan').'&jurusanId="
						+ jQuery("#PrintJurusanForm_jurusanId").val(),
						"Cetak","menubar=no,scrollbars=yes, width=950,height=800");
					//alert()
				}
			}'
		),
	)); ?>

	<div class="row">
		<?php echo $form->labelEx($printJurusanForm,'fakultasId'); ?>
		<?php echo $form->dropDownList($printJurusanForm,'fakultasId',Fakultas::model()->listData,array(
			'empty' => Yii::t('app','Select Fakultas'),
			'ajax' => array(
				'url' => array('dependentSelectJurusan'),
				'data' => array('fakultasId' => 'js:jQuery(this).val()'),
				'replace' => '#PrintJurusanForm_jurusanId'
			)
		)); ?>
		<?php echo $form->error($printJurusanForm,'fakultasId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($printJurusanForm,'jurusanId'); ?>
		<?php echo $form->dropDownList($printJurusanForm, 'jurusanId',array(),array('empty'=>Yii::t('ap','Select Jurusan')))?>
		<?php echo $form->error($printJurusanForm,'jurusanId'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app','Cetak')); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>

