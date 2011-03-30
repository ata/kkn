<?php

class KelompokController extends Controller
{
	public $layout = '//layouts/dashboard';

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
				'actions' => array('index','view','pilih'),
				'roles' => array(User::ROLE_MAHASISWA),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex()
	{
		if(!isset($_GET['Kelompok_sort'])) {
			$_GET['Kelompok_sort'] = 'kabupatenId';
		}

		$filter = new Kelompok;
		if(isset($_GET['Kelompok'])) {
			$filter->attributes = $_GET['Kelompok'];
		}
		$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
		$dataProvider = Kelompok::model()->searchAvailableKelompok($currentMahasiswa->id,$filter);
		$this->render('index',array(
			'dataProvider' => $dataProvider,
			'filter' => $filter,
		));
	}


	public function actionView()
	{
		$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
		if (isset($_GET['id'])) {
			$kelompok = Kelompok::model()->findbyPk($_GET['id']);
		} else {
			if( $currentMahasiswa->kelompok === null) {
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

		if (Yii::app()->request->isPostRequest) {
			$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
			if($currentMahasiswa->kelompokId != 0) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
			$this->loadModel()->pilih($currentMahasiswa->id);
			$this->redirect(array('view'));
		} else {
			//throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
			$this->redirect(array('view'));
		}


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
