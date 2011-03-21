<?php
$this->breadcrumbs=array(
    'Dosens'=>array('index'),
    $dosen->id=>array('view','id'=>$dosen->id),
    'Update',
);

$this->menu=array(
    array('label'=>Yii::t('app','List Dosen'), 'url'=>array('index')),
    array('label'=>Yii::t('app','Create Dosen'), 'url'=>array('create')),
    array('label'=>Yii::t('app','View Dosen'), 'url'=>array('view', 'id'=>$dosen->id)),
    array('label'=>Yii::t('app','Manage Dosen'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t('app','Update Dosen') ?></h2>

<?php echo $this->renderPartial('_form', array('dosen'=>$dosen)); ?>