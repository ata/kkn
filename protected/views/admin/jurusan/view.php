<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/admin/jurusan/index'),
	$jurusan->nama,
);
?>
<h2><?php echo Yii::t('app','Detail Jurusan') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$jurusan->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$jurusan->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus jurusan ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$jurusan,
	'attributes'=>array(
		'id',
		'nama',
		'kode',
		array(
			'name' => 'fakultasId',
			'value' => $jurusan->fakultas->nama,
		),
		'created',
		'modified',
	),
)); ?>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$jurusan->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$jurusan->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus jurusan ini?'),
		))?>
</div>

<br/><br/>

<h2><?php echo Yii::t('app','Daftar Mahasiswa')?></h2>
<?php $this->widget('zii.widgets.grid.CGridview',array(
	'id'=>'mahasiswa-grid',
	'dataProvider'=>$mahasiswa->search(),
	'filter'=>$mahasiswa,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nim',
		'nama',
		array(
			'name' =>'jenisKelamin',
			'header' => 'J.Kelamin',
			'filter' => array(
				Mahasiswa::LAKI_LAKI => Yii::t('app','Laki-laki'),
				Mahasiswa::PEREMPUAN => Yii::t('app','Perempuan'),
			)
		),
		array(
			'class'=>'CButtonColumn',
		),
	)
))?>
