<?php
$this->breadcrumbs=array(
    'Mahasiswa'=>array('index'),
    $mahasiswa->id,
);

$this->menu=array(
    array('label'=>'Daftar Mahasiswa', 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('app','Detail Mahasiswa')?></h2>
<?php $this->widget('zii.widgets.CDetailView',array(
        'data'=>$mahasiswa,
        'attributes'=>array(
            'namaLengkap',
            'nim',
            'tempatLahir',
            'tanggalLahir',
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
<?php if(isset($editable) && $editable):?>
    <?php echo CHtml::link(Yii::t('app','Perbaharui'),array('/mahasiswa/mahasiswa/update','id'=>$mahasiswa->id),array('class' => 'update-link'));?>
<?php endif?>
