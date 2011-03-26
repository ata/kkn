<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','User'),
);
?>

<h2><?php echo Yii::t('app','Kelola User') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah User'),array('create'),array('class' => 'add-button'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$user->search(),
	'filter'=>$user,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'username',
		'email',
		'nama',
		'role',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{resetPassword}{update}{view}{delete}',
			'buttons'=>array(
				'resetPassword'=>array(
					'label'=>Yii::t('app','Reset Password'),
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/key.png',
					'url'=>'Yii::app()->createUrl("/admin/user/resetPassword",array("id"=>$data->id))'
				),
			),
		),
	),
)); ?>
