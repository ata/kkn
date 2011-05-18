<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Asuransi'),
);
?>

<h2><?php echo Yii::t('app','Pembayaran Asuransi')?></h2>
<?php if(Yii::app()->user->hasFlash('lunas')):?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('lunas');?>
	</div>
<?php endif?>
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'berita-form',
	)); ?>
		<?php echo $form->errorSummary($asuransi); ?>
		<p class="note">Masukkan nim, pisahkan dengan garis baru atau koma (,)</p>
		<div class="row">
			<?php echo $form->textArea($asuransi,'stringNIM',array('rows'=>6, 'cols'=>50)); ?>
			<?php //echo $form->error($asuransi,'stringNIM'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton(Yii::t('app','Proses')); ?>
			<?php echo CHtml::link(Yii::t('app','Batalkan'),array('cancel'));?>
		</div>
	<?php $this->endWidget(); ?>
</div>
