<?php
$this->breadcrumbs=array(
    'Users',
);

$this->menu=array(
    array('label' => Yii::t('app','Create User'), 'url' => array('create')),
    array('label' => Yii::t('app','Manage User'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('app','List of User') ?></h2>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view', 
)); ?>
