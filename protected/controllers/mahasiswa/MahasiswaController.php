<?php

class MahasiswaController extends Controller
{
	private $_mahasiswa;

	public $layout = '//layouts/mahasiswa';

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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('index','view','update','dependentSelectJurusan'),
				'roles' => array(User::ROLE_MAHASISWA),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on
			//the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	public function actionIndex()
	{
		$mahasiswa = new Mahasiswa('search');
		$mahasiswa->unsetAttributes();  // clear any default values
		if (isset($_GET['Mahasiswa'])) {
			$mahasiswa->attributes = $_GET['Mahasiswa'];
		}

		$this->render('index',array(
			'mahasiswa' => $mahasiswa,
		));
	}

	public function actionDependentSelectJurusan()
	{
		echo CHtml::activeDropDownList(Mahasiswa::model(),'jurusanId',
			CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
			array('empty' => Yii::t('app','Select Jurusan'))
		);
		Yii::app()->end();
	}

	public function actionUpdate()
	{
		$mahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
		$mahasiswa->update = true;
		$this->performAjaxValidation($mahasiswa);
		if(isset($_POST['Mahasiswa'])){
			$_POST['Mahasiswa']['password'];
			$mahasiswa->attributes=$_POST['Mahasiswa'];
			if ($mahasiswa->save()) {
				$this->redirect(array('/mahasiswa/mahasiswa/view'));
			}
		}
		$this->render('update',array(
			'mahasiswa'=>$mahasiswa,
		));
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax'])) {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionView()
	{

		if(!isset($_GET['id'])){
			$mahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
			$editable = true;
		} else {
			$mahasiswa = Mahasiswa::model()->findByPk($_GET['id']);
		}
		if ($mahasiswa === null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$editable = false;
		if ($mahasiswa->user !== null && $mahasiswa->user->id === Yii::app()->user->id) {
			$editable = true;
		}
		$this->render('view',array(
			'mahasiswa' => $mahasiswa,
			'editable' => $editable
		));
	}
}
