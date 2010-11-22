<?php
$this->breadcrumbs=array(
    'Kelompok'=>array('/kelompok'),
    'View',
);?>
<h2><?php echo Yii::t('app','Detil Lokasi KKN') ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$kelompok,
    'attributes'=>array(
        array(
            'name' => 'kabupatenId',
            'value' => $kelompok->kabupaten->nama
        ),
        array(
            'name' => 'kecamatanId',
            'value' => $kelompok->kecamatan->nama
        ),
        'lokasi',
         array(
            'name' => 'programKknId',
            'value' => $kelompok->programKkn->nama
        ),
    ),
)); ?>

<h2><?php echo Yii::t('app','Anggota Kelompok')?></h2>
<div class="grid-view">
    <table class="items">
        <thead>
            <tr>
                <th><?php echo Yii::t('app','No')?></th>
                <th><?php echo Yii::t('app','Nama Lengkap')?></th>
                <th><?php echo Yii::t('app','NIM')?></th>
                <th><?php echo Yii::t('app','Jurusan')?></th>
                <th><?php echo Yii::t('app','Jenis Kelamin')?></th>
                <th><?php echo Yii::t('app','Telpon')?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($kelompok->anggota) !== 0):?>
            <?php foreach($kelompok->anggota as $i => $mahasiswa):?>
            <tr class="<?php echo $i%2==0?'odd':'even'?>">
                <td width="50px"><?php echo $i + 1 ?></td>
                <td><?php echo CHtml::link($mahasiswa->namaLengkap,array('/dashboard/mahasiswa/view','id' => $mahasiswa->id))?></td>
                <td><?php echo $mahasiswa->nim?></td>
                <td><?php echo $mahasiswa->jurusan?></td>
                <td width="100px"><?php echo $mahasiswa->displayJenisKelamin?></td>
                <td><?php echo $mahasiswa->phone1 ?></td>
            </tr>
            <?php endforeach?>
            <?php else:?>
            <tr>
                <td colspan="6" align="center"><?php echo Yii::t('app','Anggota ini belum memiliki kelompok')?></td>
            </tr>
            <?php endif?>
        </tbody>
    </table>
</div>


<h2><?php echo Yii::t('app','Peta Lokasi KKN')?></h2>

<div id="map_canvas" style="height:200px"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
    var latlng = new google.maps.LatLng(<?php echo $kelompok->latitude ?>,<?php echo $kelompok->longitude?>);
    var contentString = '<?php echo Yii::t('app','Your Location')?>';
    var options = {
        zoom: 11,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map_canvas'), options);
    var marker = new google.maps.Marker({
        position: latlng, 
        map: map,
        title: contentString,
        draggable: false
    });
    google.maps.event.addListener(marker, 'position_changed', function() {
        $('#Kelompok_latitude').val(marker.getPosition().lat());
        $('#Kelompok_longitude').val(marker.getPosition().lng());
    });
</script>
<?php if($currentMahasiswa->kelompokId == 0):?>
<div class="">
    <?php echo CHtml::link(Yii::t('app','Pilih Kelompok ini'), 
        array('pilih','id' => $kelompok->id), 
        array(
            'submit'=>array('pilih','id'=>$kelompok->id),
            'confirm'=>Yii::t('app','Anda tidak lagi bisa memilih ulang lagi kelompok, apa anda yakin akan memilih kelompok ini?')))?>
</div>
<?php endif?>

