<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/reCopy.js')?>
<?php Yii::app()->clientScript->registerScript('upload-js','
	
	
	var linkHapus = "'."<a onclick='$(this).parent().slideUp(function(){ $(this).remove() }); return false' class='remove' href='#'>remove</a>".'";

	$(".clone").relCopy({ append: linkHapus}); 
')
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Program KKN') => array('/admin/programKkn/index'),
	Yii::t('app','Tambah')
);
?>
<h2><?php echo Yii::t('app','Tambah Program KKN') ?></h2>

<?php echo $this->renderPartial('_form', array('programKkn'=>$programKkn)); ?>
