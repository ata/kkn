<?php
$this->breadcrumbs=array(
    'Dosens'=>array('index'),
    $dosen->id,
);

$this->menu=array(
    array('label'=>Yii::t('app','List Dosen'), 'url'=>array('index')),
    array('label'=>Yii::t('app','Create Dosen'), 'url'=>array('create')),
    array('label'=>Yii::t('app','Update Dosen'), 'url'=>array('update', 'id'=>$dosen->id)),
    array('label'=>Yii::t('app','Delete Dosen'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$dosen->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>Yii::t('app','Manage Dosen'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t('app','View Dosen') ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$dosen,
    'attributes'=>array(
        'id',
        'nip',
        'namaLengkap',
        'jenisKelamin',
        'userId',
        'fakultasId',
        'jurusanId',
        'kontak',
        'created',
        'modified',
    ),
)); ?>
