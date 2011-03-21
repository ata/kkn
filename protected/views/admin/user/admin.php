<?php
$this->breadcrumbs=array(
    'Users'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label' => Yii::t('app','List User'), 'url' => array('index')),
    array('label' => Yii::t('app','Create User'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h2><?php echo Yii::t('app','Management User') ?></h2>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'user'=>$user,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-grid',
    'dataProvider'=>$user->search(),
    'filter'=>$user,
    'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'nama',
		'created',
		/*
		'modified',
		'role',
		*/
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
