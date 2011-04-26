<?php
$this->breadcrumbs=array(
    Yii::t('app','Mahasiswa'),
);?>
<h2><?php echo Yii::t('app','Daftar Mahasiswa')?></h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'mahasiswa-grid',
    'dataProvider'=>$mahasiswa->search(),
    'filter'=>$mahasiswa,
    'columns'=>array(
        array(
            'header' => 'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',  
            'htmlOptions' => array('width' => '30px'),
        ),
        array(
            'name' => 'namaLengkap',
            'value' => 'CHtml::link($data->namaLengkap,array("view","id" => $data->id))',
            'type' => 'raw',
            'htmlOptions' => array('width' => '175px'),
        ),
        array(
            'name' => 'nim',
            'htmlOptions' => array('width' => '80px'),
        ),
        array(
            'name' =>'jurusanId',
            'filter' => Jurusan::model()->listData,
            'value' => '$data->namaJurusan',
            'htmlOptions' => array('width' => '250px'),
        ),
        array(
            'name' =>'jenisKelamin',
            'header' => 'J.Kelamin',
            'filter' => array(
                Mahasiswa::LAKI_LAKI => Yii::t('app','Laki-laki'),
                Mahasiswa::PEREMPUAN => Yii::t('app','Perempuan'),
            ),
            'value' => '$data->displayJenisKelamin'
        ),
        array(
            'name' =>'registered',
            'header' => 'Status',
            'value' => '$data->registered?Yii::t("app","Sudah Registrasi"):Yii::t("app","Belum Registrasi")',
            'filter' => array(
                0 => Yii::t('app','Belum Registrasi'),
                1 => Yii::t('app','Sudah Registrasi'),
                
            )
        ),
    ),
)); ?>
