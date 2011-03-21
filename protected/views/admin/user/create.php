<?php
$this->breadcrumbs=array(
    'Users'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label' => Yii::t('app','List User'), 'url' => array('index')),
    array('label' => Yii::t('app','Manage User'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('app','Create New User') ?></h2>

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>