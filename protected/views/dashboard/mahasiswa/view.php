<?php
$this->breadcrumbs=array(
    'Mahasiswa'=>array('index'),
    $mahasiswa->id,
);

$this->menu=array(
    array('label'=>'Daftar Mahasiswa', 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Detail User')?></h2>
<?php $this->widget('zii.widgets.CDetailView',array(
        'data'=>$mahasiswa,
        'attributes'=>array(
            'namaLengkap',
            'nim',
            'alamatAsal',
            'alamatTinggal',
            'fakultas',
            'jurusan',
            'jenjang',
            'displayJenisKelamin',
            'phone1',
            'phone2',
        )
    ));
?>
<?php if($editable):?>
    <?php echo CHtml::link(Yii::t('app','perbaharui'),array('/dashboard/mahasiswa/update','id'=>$mahasiswa->id));?>
<?php endif?>
