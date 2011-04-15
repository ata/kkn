<?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'bayarDiv',
	'options'=>array(
		'title'=>Yii::t('app','Bayar Asuransi'),
		'autoOpen'=>true,
		'modal'=>'true',
		'width'=>'auto',
		'height'=>'auto',
	),
))?>
<?php echo $this->renderPartial('_formBayar',array('mahasiswa'=>$mahasiswa))?>
<?php $this->endWidget()?>
