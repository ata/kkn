<?php
$this->breadcrumbs=array(
    'Users'=>array('index'),
    $user->id=>array('view','id'=>$user->id),
    'Update',
);

$this->menu=array(
    array('label'=>Yii::t('app','List User'), 'url'=>array('index')),
    array('label'=>Yii::t('app','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('app','View User'), 'url'=>array('view', 'id'=>$user->id)),
    array('label'=>Yii::t('app','Manage User'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t('app','Update User') ?></h2>

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>