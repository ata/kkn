<div class="view<?php echo $data->isPenuh?' notice':'' ?>">
    <span class="kelompok_lokasi"><?php echo $data->lokasi ?></span>,
    <span class="kelompok_lokasi"><?php echo $data->kecamatan->nama ?></span>,
    <span class="kelompok_lokasi"><?php echo $data->kabupaten->nama ?></span>
    <span class="kelompok_lokasi">
        <?php echo CHtml::link(Yii::t('app','pilih'),array('view','id' => $data->id))?>
    </span>
</div>
