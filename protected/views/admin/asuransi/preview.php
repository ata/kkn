<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Asuransi') => array('/admin/asuransi/index'),
	Yii::t('app','Asuransi Preview'),
);
?>

<h2><?php echo Yii::t('app','Preview Pembayaran Asuransi')?></h2>
<div class="form">
	<form action="<?php echo $this->createUrl('lunasi')?>" method="post">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'mahasiswa-grid',
			'dataProvider'=>$asuransi->preview(),
			'columns'=>array(
				array(
					'class' => 'NumberColumn',
				),
				'nim',
				'nama',
				'namaJurusan',
				'statusAsuransi'
		)));?>

		<div class="row buttons">
			<?php echo CHtml::submitButton(Yii::t('app','Lunasi')); ?>  &nbsp;&nbsp;
			<?php echo CHtml::link(Yii::t('app','Perbaharui'),array('index'));?>  &nbsp;&nbsp;
			<?php echo CHtml::link(Yii::t('app','Batalkan'),array('cancel'));?>
		</div>
	</form>
</div>

