
<?php Yii::app()->clientScript->registerScript('print-js','
	$(":input").val("");
	$("#print").click(function(){
		var filter = $(":input").serialize();
		var pageUrl = "'.Yii::app()->createUrl("admin/jurusan/mahasiswaPrint").'" + "&" + "jurusanId" + "=" + "'.$jurusan->id.'" + "&" + filter;

		if(!$("#iframePrint")[0])
		{
			$("body").append("<iframe src="+pageUrl+" name='."iframePrint".' id='."iframePrint".'></iframe>");
			$("#iframePrint").bind("load",
				function(){
					frames["iframePrint"].focus();
					frames["iframePrint"].print();
				}
			)
		} else {
			$("#iframePrint").attr("src",pageUrl);
		}
	})
')?>
<script type="text/javascript">

</script>
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
<div class="print-button">
	<a href="#" id="print"><img src="<?php echo Yii::app()->request->baseUrl.'/images/print.gif'?>"></a>
</div>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'mahasiswa-grid',
	'dataProvider'=>$mahasiswa->search(),
	'filter'=>$mahasiswa,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nim',
		array(
			'name' => 'namaLengkap',
			'header' => 'Nama'
		),
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
			'viewButtonUrl' => 'array("admin/mahasiswa/view","id" => $data->id)',
			'updateButtonUrl' => 'array("admin/mahasiswa/update","id" => $data->id)',
			'deleteButtonUrl' => 'array("admin/mahasiswa/delete","id" => $data->id)',
		),
	)
))?>

