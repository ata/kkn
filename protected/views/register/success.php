<?php
$this->breadcrumbs=array(
	'Register',
);?>
<div class="success">
    <?php echo Yii::t('app','Registrasi Berhasil, silahkan {login}',array(
		'{login}' => CHtml::link(Yii::t('app','Login disini'),array('site/login')),
    ))?>
</div>
