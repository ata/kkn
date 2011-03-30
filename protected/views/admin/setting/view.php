<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Setting') => array('/admin/setting/index'),
	$setting->key,
);
?>

<h2><?php echo Yii::t('app','Detail Setting') ?></h2>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$setting->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$setting->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus setting ini?'),
		))?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$setting,
    'attributes'=>array(
        'id',
        'key',
        'value',
        'created',
        'modified',
    ),
)); ?>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$setting->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$setting->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus setting ini?'),
		))?>
</div>
