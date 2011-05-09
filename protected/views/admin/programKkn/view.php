<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kelompok') => array('/admin/programKkn/index'),
	$programKkn->nama,
);
?>


<h2><?php echo Yii::t('app','Detail Program KKN') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$programKkn->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$programKkn->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus programKkn ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$programKkn,
	'attributes'=>array(
		'id',
		'nama',
		'deskripsi',
		'created',
		'modified',
	),
)); ?>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$programKkn->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$programKkn->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus programKkn ini?'),
		))?>
</div>

<h2><?php echo Yii::t('app','Lampiran')?></h2>
<?php foreach($programKkn->lampiran as $data):?>
	<?php echo CHtml::link($data->nama,array('downloadFile','id'=>$data->id))?><br>
<?php endforeach?>

<h2><?php echo Yii::t('app','Prioritas Jurusan')?></h2>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'prioritas-form',
		'enableAjaxValidation' => true,
		'action'=>Yii::app()->createUrl("admin/programKkn/addPrioritas"),
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'afterValidate'=>'js:function(form,data,hasError){
				if(!hasError){
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






