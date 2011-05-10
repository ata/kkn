<?php

class RegisterController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on
			//the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'testLimit' => 10,
				'fixedVerifyCode' => 'code',
			),
		);
	}

	public function actionUnder()
	{
		$this->render('under');
	}

	public function actionIndex()
	{
		$this->redirect(array('under'));
		$mahasiswa = new Mahasiswa;
		$this->performAjaxValidation($mahasiswa);
		if (isset($_POST['Mahasiswa'])) {
			$mahasiswa = Mahasiswa::model()->findByNIM(trim($_POST['Mahasiswa']['nim']));
			if($mahasiswa !== null && $mahasiswa->isRegistered) {
				Yii::app()->user->setFlash('message',"Mahasiswa dengan "
					. "NIM <b>{$mahasiswa->nim}</b> sudah terdaftar");
				$this->redirect(array('token'));
			}
			if($mahasiswa === null) {
				Yii::app()->user->setFlash('message',"Mahasiswa dengan "
					. "NIM <b>{$_POST['Mahasiswa']['nim']}</b> tidak ada dalam sistem "
					. "silahkan hubungi petugas LPPM");
				$mahasiswa = new Mahasiswa;
			} else if(isset($_POST['Mahasiswa']['namaLengkap'])) {
				$mahasiswa->attributes = $_POST['Mahasiswa'];
				if($mahasiswa->save()) {
					$this->redirect(array('registerSuccess'));
				} else {
					var_dump($mahasiswa->errors);
				}
			}
		}

		$this->render('index',array(
			'mahasiswa' => $mahasiswa,
		));
	}

	public function actionRegisterSuccess()
	{
		$this->render('success');
	}

	public function actionToken()
	{
		$this->render('token');
	}

	public function actionDependentSelectJurusan()
	{
		echo CHtml::activeDropDownList(Mahasiswa::model(),'jurusanId',
			CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
			array('empty' => Yii::t('app','Select Jurusan'))
		);
		Yii::app()->end();
	}


	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax'])) {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
