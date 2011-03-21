<?php
$this->breadcrumbs=array(
    'Users'=>array('index'),
    $user->id,
);

$this->menu=array(
    array('label'=>Yii::t('app','List User'), 'url'=>array('index')),
    array('label'=>Yii::t('app','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('app','Update User'), 'url'=>array('update', 'id'=>$user->id)),
    array('label'=>Yii::t('app','Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$user->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>Yii::t('app','Manage User'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t('app','View User') ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$user,
    'attributes'=>array(
        'id',
        'username',
        'password',
        'email',
        'nama',
        'created',
        'modified',
        'role',
    ),
)); ?>
