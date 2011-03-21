<?php 
$this->breadcrumbs=array(
    Yii::t('app','Mahasiswa')=>array('index'),
    Yii::t('app','Registrasi Berhasil'),
);
?>
<div class="success">
    <?php echo Yii::t('app','Registrasi Berhasil, silahkan {login}',array(
		'{login}' => CHtml::link(Yii::t('app','Login disini'),array('site/login')),
    ))?>
</div>
