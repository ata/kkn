<?php
$this->breadcrumbs=array(
    'Dosens',
);

$this->menu=array(
    array('label' => Yii::t('app','Create Dosen'), 'url' => array('create')),
    array('label' => Yii::t('app','Manage Dosen'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('app','List of Dosen') ?></h2>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view', 
)); ?>
