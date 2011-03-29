<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/reCopy.js')?>
<?php Yii::app()->clientScript->registerScript('upload-js','
	
	
	var linkHapus = "'."<a onclick='$(this).parent().slideUp(function(){ $(this).remove() }); return false' class='remove' href='#'>remove</a>".'";

	$(".clone").relCopy({ append: linkHapus}); 
')
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Program KKN') => array('/admin/programKkn/index'),
	Yii::t('app','Tambah')
);
?>
<h2><?php echo Yii::t('app','Tambah Program KKN') ?></h2>



<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'program-kkn-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($programKkn); ?>

	<div class="row">
		<?php echo $form->labelEx($programKkn,'nama'); ?>
		<?php echo $form->textField($programKkn,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($programKkn,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($programKkn,'deskripsi'); ?>
		<?php echo $form->textArea($programKkn,'deskripsi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($programKkn,'deskripsi'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($programKkn,'files')?>
		<div class="upload_field">
			<?php echo $form->fileField($programKkn,'files[]',array('class'=>'formUpload'));?>
		</div>
		<div class="upload-button">
			<?php echo CHtml::button(Yii::t('app','Tambah File'),array('class'=>'clone','name'=>'clone','rel'=>'.upload_field'))?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($programKkn->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

