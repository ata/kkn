<?php
$this->breadcrumbs=array(
    'Kecamatans'=>array('index'),
    $kecamatan->id,
);

$this->menu=array(
    array('label'=>Yii::t('app','List Kecamatan'), 'url'=>array('index')),
    array('label'=>Yii::t('app','Create Kecamatan'), 'url'=>array('create')),
    array('label'=>Yii::t('app','Update Kecamatan'), 'url'=>array('update', 'id'=>$kecamatan->id)),
    array('label'=>Yii::t('app','Delete Kecamatan'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$kecamatan->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>Yii::t('app','Manage Kecamatan'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t('app','View Kecamatan') ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$kecamatan,
    'attributes'=>array(
        'id',
        'nama',
        'kabupatenId',
        'created',
        'modified',
    ),
)); ?>


<h3><?php echo Yii::t('app','Daftar Kelompok yang Tersedia')?></h3>
<?php $this->widget('zii.widgets.grid.CGridView',array(
    'id'=>'kecamatan-grid',
    'dataProvider'=>$kelompok->search(),
    'filter'=>$kelompok,
    'columns'=>array(
        array(
            'header'=>'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('width' => '50px'),
        ),
        array(
            'name'=>'programKknId',
            'value'=>'$data->programKkn->nama',
            'filter'=>ProgramKkn::model()->listData,
        ),
        array(
            'name'=>'kabupatenId',
            'value'=>'$data->kabupaten->nama',
            'filter'=>Kabupaten::model()->listData,
        ), 
        'lokasi',
        array(
            'class'=>'CButtonColumn',
            'viewButtonUrl' => 'array("admin/kelompok/view","id" => $data->id)',
            'updateButtonUrl' => 'array("admin/kelompok/update","id" => $data->id)',
            'deleteButtonUrl' => 'array("admin/kelompok/delete","id" => $data->id)',
        ),
    ),
));
?>


