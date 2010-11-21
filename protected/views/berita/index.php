<?php
$this->breadcrumbs=array(
    'Berita',
);?>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view', 
    'summaryText' => Yii::t('app','Menampilan {start}-{end} dari {count} data'),
)); ?>

