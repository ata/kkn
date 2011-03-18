<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Berita') => array('/admin/berita/index'),
	$berita->title,
);
?>

<h2><?php echo Yii::t('app','Detail Berita') ?></h2>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$berita->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$berita->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$berita,
	'attributes'=>array(
		'id',
		'title',
		//'body',
		array(
			'name' => 'body',
			'value' => nl2br(CHtml::encode($berita->body)),
			'type' => 'raw',
		),
		'created',
		'modified',
	),
)); ?>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$berita->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$berita->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>
