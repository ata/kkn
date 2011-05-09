<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/reCopy.js')?>
<?php Yii::app()->clientScript->registerScript('upload-js','
	var linkHapus = "'."<a onclick='$(this).parent().slideUp(function(){ $(this).remove() }); return false' class='remove' href='#'>remove</a>".'";
	$(".clone").relCopy({ append: linkHapus});
	$(".lampiran-delete").live("click",function(){
		var ID = $(this).attr("id");
		if(confirm("'.Yii::t("app","Anda yakin ingin menghapus file ini?").'")){
			$.post(
				"'.Yii::app()->createUrl("admin/programKkn/deleteFile").'",
				{id:ID},
				function(response){
					if(response="success"){
						$("#"+ID).slideUp("slow");
					} else {
						alert ("'.Yii::t("app","File gagal dihapus").'");
					}
				}
			);
			return false;
		} else {
			return false;
		}
	});
')
?>
<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Program KKN') => array('/admin/programKkn/index'),
	$programKkn->nama => array('/admin/programKkn/view','id' => $programKkn->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Update Program Kkn') ?></h2>



<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'program-kkn-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<?php echo $form->errorSummary($programKkn); ?>

	<div class="row">
		<?php echo $form->labelEx($programKkn,'nama'); ?>
		<?php echo $form->textField($programKkn,'nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($programKkn,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($programKkn,'deskripsi'); ?>
		<?php echo $form->textArea($programKkn,'deskripsi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($programKkn,'deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($programKkn,'files')?>
		<div class="lampiran">
			<?php foreach($programKkn->lampiran as $data):?>
				<div class="lampiran-ui" id="<?php echo $data->id?>">
					<span class="title"><a href="<?php echo Yii::app()->params['webroot']."/".$data->path?>"><?php echo $data->nama?></a></span>
					<a href="#" class="lampiran-delete" id="<?php echo $data->id?>"><?php echo Yii::t('app','hapus') ?></a>
				</div>
			<?php endforeach?>
		</div>
		<div id="upload_field" class="upload_field">
			<?php echo $form->fileField($programKkn,'files[]',array('class'=>'formUpload'));?>
		</div>
		<div class="upload-button">
			<?php echo CHtml::link(Yii::t('app','Tambah File lain'),array('#'),array('class'=>'clone','name'=>'clone','rel'=>'#upload_field'))?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($programKkn->isNewRecord ? Yii::t('app','Tambah') : Yii::t('app','Simpan')); ?>
		<?php echo CHtml::link(Yii::t('app','Batal'),array('index'),array('class' => 'cancel-button'))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<h2><?php echo Yii::t('app','Prioritas Jurusan')?></h2>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'prioritas-form',
		'enableAjaxValidation' => true,
		'action'=>Yii::app()->createUrl('admin/programKkn/addPrioritas'),
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'afterValidate'=>'js:function(form,data,hasError){
				if (!hasError) {
					form.ajaxSend();
					jQuery("#prioritas-form").get(0).reset();
					jQuery.fn.yiiGridView.update("prioritas-grid");
				}
			}'
		),
	)); ?>

	<p class="note"><?php echo Yii::t('app','Inputan dengan tanda <span class="required">*</span> wajib di isi')?></p>

	<div class="row">
		<?php echo $form->labelEx($prioritas,'level'); ?>
		<?php echo $form->dropDownList($prioritas,'level',
			array(
				1 => 'Level 1',
				2 => 'Level 2',
				3 => 'Level 3',
				4 => 'Level 4',
				5 => 'Level 5',
			),array('empty'=>Yii::t('app','Pilih Level Prioritas'))); ?>
		<?php echo $form->error($prioritas,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($prioritas,'fakultasId'); ?>
		<?php echo $form->dropDownList($prioritas,'fakultasId',Fakultas::model()->listData,array(
			'empty' => Yii::t('app','Select Fakultas'),
			'ajax' => array(
				'url' => array('dependentSelectJurusan'),
				'data' => array('fakultasId' => 'js:jQuery(this).val()'),
				'replace' => '#Prioritas_jurusanId'
			)
		)); ?>
		<?php echo $form->error($prioritas,'fakultasId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($prioritas,'jurusanId'); ?>
		<?php echo $form->dropDownList($prioritas,'jurusanId',
			Jurusan::model()->listData,array('empty' => Yii::t('app','Pilih Jurusan'))); ?>
		<?php echo $form->error($prioritas,'jurusanId'); ?>
	</div>
	<?php echo $form->hiddenField($prioritas,'programKknId',array('value'=>$programKkn->id))?>
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app','submit'));?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prioritas-grid',
	'dataProvider'=>$prioritas->search(),
	'columns'=>array(
		array(
			'header' => 'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions' => array('width' => '50px'),
		),
		'level',
		'jurusan.nama',
		array(
			'class'=>'CButtonColumn',
			'deleteButtonUrl' => 'array("deletePrioritas","id" => $data->jurusan->id, "prioritas_id" => $data->id)',
			'viewButtonOptions' => array('style' => 'display:none'),
			'updateButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>

