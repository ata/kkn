
<?php $this->beginContent('//layouts/main'); ?>

<div id="main-admin">
	<div class="container" id="admin-container">
		<div class="span-5" id="sidebar">
			<h3><?php echo Yii::t('app','Menu') ?></h3>
			<?php $this->widget('SideMenu', array(
				 'items'=>array(
					array('label' => Yii::t('app','Mahasiswa'),'url' => array('/mahasiswa/mahasiswa/view')),
					array('label' => Yii::t('app','Kelompok/Lokasi'),'url' => array('/mahasiswa/kelompok/view')),
				),
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

