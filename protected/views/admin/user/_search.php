<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($user,'id'); ?>
        <?php echo $form->textField($user,'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($user,'username'); ?>
        <?php echo $form->textField($user,'username',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($user,'email'); ?>
        <?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($user,'nama'); ?>
        <?php echo $form->textField($user,'nama',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($user,'created'); ?>
        <?php echo $form->textField($user,'created'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($user,'modified'); ?>
        <?php echo $form->textField($user,'modified'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($user,'role'); ?>
        <?php echo $form->textField($user,'role',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
