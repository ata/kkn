
<?php $this->beginContent('//layouts/main'); ?>

<div id="main">
    <div class="container" id="admin-container">
        <div class="span-5" id="sidebar">
            <h3><?php echo Yii::t('app','Menu') ?></h3>
            <?php $this->widget('zii.widgets.CMenu', array(
                 'items'=>array(
                    array('label' => Yii::t('app','Profile'),'url' => array('/dashboard/mahasiswa/view')),
                    //array('label' => Yii::t('app','Download'),'url' => array('/dashboard/kelompok/download')),
                    array('label' => Yii::t('app','Kelompok/Lokasi'),'url' => array('/dashboard/kelompok/index')),
                ),
            ));?>
            <?php if(!empty($this->menu)):?>
            <h3><?php echo Yii::t('app','Operasi') ?></h3>
            <?php endif?>
            <?php  $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
            ));?>
            
        </div><!-- sidebar -->
        <div class="span-19 last">
            <div id="content">
                <?php echo $content; ?>
            </div><!-- content -->
        </div>
    
    </div>
</div>
<?php $this->endContent(); ?>

