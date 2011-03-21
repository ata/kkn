<?php
$this->breadcrumbs=array(
    'Kelompok',
);?>
<h2><?php echo Yii::t('app','Daftar Kelompok/Lokasi KKN yang tersedia')?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'kelompok-grid',
    'dataProvider'=>$dataProvider,
    'filter'=>$filter,
    'columns'=>array(
        array(
            'header' => 'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',  
            'htmlOptions' => array('width' => '50px'),
        ),
        array(
            'name'=>'kabupatenId',
            'value'=>'$data->kabupaten->nama',
            'filter'=>Kabupaten::model()->listData,
        ), 
        array(
            'name'=>'kecamatanId',
            'value'=>'$data->kecamatan->nama',
            'filter'=>Kecamatan::model()->listData,
        ),
        'lokasi',
        array(
            'name'=>'programKknId',
            'value'=>'$data->namaProgramKkn',
            'filter'=>ProgramKkn::model()->listData,
        ),
        array(
            'name' => 'jumlahAnggota',
            'header' => 'Anggota',
            'value' => '$data->jumlahAnggota . " orang (" . $data->jumlahLakiLaki . '
                        . '" laki-laki, " . $data->jumlahLakiLaki . " perempuan)"',
            'filter' => false,
        ),
        array(
            'header' => '',
            'value' => 'CHtml::link("Lihat detail",array("/dashboard/kelompok/view","id" => $data->id),array("class" => "detail-link"))',
            'type' => 'raw',
            'htmlOptions' => array('width' => '70px'),
        )
    ),
)); ?>
