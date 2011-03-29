<?php $this->beginContent('//layouts/main'); ?>

<div id="main-admin">
	<div class="container" id="admin-container">
		<div class="span-5" id="sidebar">
			<h3><?php echo Yii::t('app','Menu') ?></h3>
			<?php $this->widget('SideMenu', array(
				'items'=>array(
					array('label' => Yii::t('app','Berita'),'url' => array('/admin/berita/index'), Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Fakultas'),'url' => array('/admin/fakultas/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Jurusan / Program Studi'),'url' => array('/admin/jurusan/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Jenjang Studi'),'url' => array('/admin/jenjang/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Kabupaten'),'url' => array('/admin/kabupaten/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Kecamatan'),'url' => array('/admin/kecamatan/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Program KKN'),'url' => array('/admin/programKkn/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Kelompok / Lokasi'),'url' => array('/admin/kelompok/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','User'),'url' => array('/admin/user/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Dosen'),'url' => array('/admin/dosen/index'),Yii::app()->user->role === 'admin'),
					array('label' => Yii::t('app','Mahasiswa'),'url' => array('/admin/mahasiswa/index'),Yii::app()->user->role === 'admin'),
					//array('label'=>Yii::t('app','Statistik'),'url'=>array('/admin/statistik/index')),
				),
				'htmlOptions'=>array('class'=>'sidemenu'),
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
