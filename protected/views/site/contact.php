<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
    'Contact',
);
?>
<div class="content">
    <h2><?php echo Yii::t('app','Kontak Kami') ?></h2>
    <?php if(Yii::app()->user->hasFlash('contact')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div> 
    <?php endif ?>
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm',array(
        'enableAjaxValidation'=>true,
    )); ?>
	<p align=justify>Apabila anda memiliki kritik, saran dan masukkan silahkan isi form di bawah ini. Kritik, saran dan masukkan dari anda dapat berarti bagi kemajuan website ini. Terimakasih</p>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php /* echo $form->errorSummary($model); */?>

        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name'); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'subject'); ?>
            <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'subject'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'body'); ?>
            <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'body'); ?>
        </div>

        <?php if(extension_loaded('gd')): ?>
        <div class="row">
            <?php echo $form->labelEx($model,'verifyCode'); ?>
            <div>
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model,'verifyCode'); ?>
            </div>
            <div class="hint">
                <?php echo Yii::t('app','Silakan masukkan huruf dalam gambar')?>
            </div>
        </div>
        <?php endif; ?>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Kirim'); ?>
        </div>

    <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>

