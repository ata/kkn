<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','User') => array('/admin/user/index'),
	$user->nama,
);
?>
<h2><?php echo Yii::t('app','Detail User') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$user->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$user->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$user,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'nama',
		'created',
		'modified',
		'role',
	),
)); ?>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$user->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$user->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>
