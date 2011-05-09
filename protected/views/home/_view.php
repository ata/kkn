<h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></h2>
<div class="view">
    <p><?php echo nl2br($data->summary)?></p>
    <?php echo CHtml::link(Yii::t('app','baca selengkapnya &raquo;'),array('view','id' => $data->id))?>
</div>
