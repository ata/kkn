<?php $form = $this->beginWidget('CActiveForm',array(
	'id'=>'mahasiswa-form',
	'enableAjaxValidation'=>true,
	'action'=>'#',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'afterValidate'=>'js:function(form,data,hasError){
			if(!hasError){
				var isi = $("form").serialize();
				jQuery.ajax({
					url:"'.Yii::app()->createUrl("admin/mahasiswa/bayarAsuransi").'",
					data:isi,
					type:"POST",
					success:function(){
						$("#bayarDiv").dialog("close");
						$("#showBayarDiv").remove();
						$("#action-view").append("<a>test</a>");
					}
				});
			}
		}'
	),
))?>

<div class="row">
	<?php echo $form->labelEx($mahasiswa,'jumlahAsuransi')?>
	<?php echo $form->textField($mahasiswa,'jumlahAsuransi')?>
	<?php echo $form->error($mahasiswa,'jumlahAsuransi')?>
	<?php echo $form->hiddenField($mahasiswa,'id')?>
</div>

<?php echo CHtml::submitButton('submit');?>
<?php $this->endWidget()?>
