<?php
$this->breadcrumbs=array(
    'Dosens'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label' => Yii::t('app','List Dosen'), 'url' => array('index')),
    array('label' => Yii::t('app','Manage Dosen'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('app','Create New Dosen') ?></h2>

<?php echo $this->renderPartial('_form', array('dosen'=>$dosen)); ?>