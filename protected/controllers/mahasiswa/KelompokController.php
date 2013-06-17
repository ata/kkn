<?php

class KelompokController extends Controller
{
	public $layout = '//layouts/mahasiswa';

	private $_model;

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('index','view','pilih','download','print','keluar'),
				'roles' => array(User::ROLE_MAHASISWA),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
		if (!$currentMahasiswa || $currentMahasiswa->kelompokId != null) {
			$this->redirect(array('view'));
		}
		$kelompok = new Kelompok('search');
		if(isset($_GET['Kelompok'])) {
			$kelompok->attributes = $_GET['Kelompok'];
		}
		$this->render('index',array(
			'kelompok' => $kelompok,
			'currentMahasiswa' => $currentMahasiswa,
		));
	}


	public function actionView()
	{
		$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);

		// hack
		if($currentMahasiswa->tempatLahir == null) {
			Yii::app()->user->setFlash('pesan',Yii::t('app','Mohon untuk melengkapi data untuk keperluan asuransi'));
			$this->redirect(array('mahasiswa/mahasiswa/update'));
		}

		$kelompok = null;
		if (isset($_GET['id'])) {
			$kelompok = Kelompok::model()->findbyPk($_GET['id']);
		} else {
			if($currentMahasiswa->kelompokId == null) {
				$this->redirect(array('index'));
			}
			$kelompok = $currentMahasiswa->kelompok;
		}
		$this->render('view',array(
			'kelompok' => $kelompok,
			'currentMahasiswa' => $currentMahasiswa,
		));
	}

	public function actionPilih()
	{
		if(!$this->isOpened()) {
			throw new CHttpException(403, Yii::t('app','Pemilihan kelompok ditutup'));
		}

		if (Yii::app()->request->isPostRequest) {
			$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
			if($currentMahasiswa->kelompokId != null) {
				throw new CHttpException(404, Yii::t('app','Halaman tidak tersedia.'));
			}
			$this->loadModel()->pilih($currentMahasiswa);
			$this->redirect(array('view'));
		} else {
			//throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
			$this->redirect(array('view'));
		}
	}

	public function actionDownload(){
		if(isset($_GET['id'])){
			$file = ProgramKknLampiran::model()->findByPk($_GET['id']);
			header("Content-Disposition: attachment;filename={$file->nama}");
			header("Content-Length: {$file->size}");
			header("Content-Type: {$file->mimetype}");
			readfile(Yii::app()->params['webroot'] . $file->path);
		}
	}

	public function actionPrint()
	{
		$this->layout = '//layouts/print';
		$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
		$kelompok = $currentMahasiswa->kelompok;
		$this->render('print',array(
			'kelompok' => $kelompok,
			'currentMahasiswa' => $currentMahasiswa,
		));
	}

	public function actionKeluar()
	{
		if(!$this->isOpened()) {
			throw new CHttpException(403, Yii::t('app','Pemilihan kelompok ditutup'));
		}
		if (Yii::app()->request->isPostRequest) {
			$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
			if($currentMahasiswa->kelompokId == null) {
				throw new CHttpException(404, Yii::t('app','Halaman tidak tersedia.'));
			}
			$currentMahasiswa->unsetKelompok();
			$this->redirect(array('index'));
		} else {
			//throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
			$this->redirect(array('view'));
		}
	}

	public function isOpened()
	{
		return (bool) Setting::model()->get('OPENED',1);
	}

	public function loadModel()
	{
		if ($this->_model === null) {
			if (isset($_GET['id'])) {
				$this->_model = Kelompok::model()->findbyPk($_GET['id']);
			}
			if ($this->_model === null) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		return $this->_model;
	}

}
