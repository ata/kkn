<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($dosen,'id'); ?>
        <?php echo $form->textField($dosen,'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'nip'); ?>
        <?php echo $form->textField($dosen,'nip',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'namaLengkap'); ?>
        <?php echo $form->textField($dosen,'namaLengkap',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'jenisKelamin'); ?>
        <?php echo $form->textField($dosen,'jenisKelamin',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'userId'); ?>
        <?php echo $form->textField($dosen,'userId'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'fakultasId'); ?>
        <?php echo $form->textField($dosen,'fakultasId'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'jurusanId'); ?>
        <?php echo $form->textField($dosen,'jurusanId'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'kontak'); ?>
        <?php echo $form->textField($dosen,'kontak',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'created'); ?>
        <?php echo $form->textField($dosen,'created'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($dosen,'modified'); ?>
        <?php echo $form->textField($dosen,'modified'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
