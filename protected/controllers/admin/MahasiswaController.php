<?php

class MahasiswaController extends AdminController
{
	public function getMoreAllowRoles() {
		return array(User::ROLE_STAFF);
	}
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$mahasiswa = $this->loadModel();
		$this->performValidationAsuransi($mahasiswa);
		$this->render('view',array(
			'mahasiswa' => $mahasiswa,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$mahasiswa = new Mahasiswa;
		$mahasiswa->inputCaptcha = false;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($mahasiswa);

		if (isset($_POST['Mahasiswa'])) {
			$mahasiswa->attributes=$_POST['Mahasiswa'];
			if ($mahasiswa->save()) {
				$this->redirect(array('view','id' => $mahasiswa->id));
			}
		}

		$this->render('create',array(
			'mahasiswa' => $mahasiswa,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$mahasiswa = $this->loadModel();
		if($mahasiswa->isRegistered) {
			$mahasiswa->update = true;
		}
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($mahasiswa);

		if (isset($_POST['Mahasiswa'])) {
			$mahasiswa->attributes=$_POST['Mahasiswa'];
			if ($mahasiswa->save()) {
				$this->redirect(array('view','id' => $mahasiswa->id));
			}
		}

		$this->render('update',array(
			'mahasiswa' => $mahasiswa,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	public function actionPrint()
	{
		//Yii::app()->preload = array();
		$this->layout = '//layouts/print';
		$mahasiswa = new Mahasiswa('search');
		$mahasiswa->unsetAttributes();  // clear any default values
		if (isset($_GET['Mahasiswa'])) {
			$mahasiswa->attributes = $_GET['Mahasiswa'];
		}
		$fakultasList = Fakultas::model()->findAll();
		$this->render('print',array(
			'fakultasList' => $fakultasList,
			'mahasiswa' => $mahasiswa
		));
	}
	/**
	 * Manages all models.
	 */
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

	public function actionDependentSelectKecamatan()
	{
		echo CHtml::activeDropDownList(Mahasiswa::model(),'kecamatanId',
			CHtml::listData(Kecamatan::model()->findAllByKabupatenId($_GET['kabupatenId']),'id','nama'),
			array('empty' => Yii::t('app','Select Kecamatan'))
		);
		Yii::app()->end();
	}

	public function actionDependentSelectKelompok()
	{
		echo CHtml::activeDropDownList(Mahasiswa::model(),'kelompokId',
			CHtml::listData(Kelompok::model()->findAllByKecamatanId($_GET['kecamatanId']),'id','nama'),
			array('empty' => Yii::t('app','Select Kelompok'))
		);
		Yii::app()->end();
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if ($this->_model === null) {
			if (isset($_GET['id'])) {
				$this->_model = Mahasiswa::model()->findbyPk($_GET['id']);
			}
			if ($this->_model === null) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		$this->_model->inputCaptcha = false;
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($mahasiswa)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'mahasiswa-form') {
			echo CActiveForm::validate($mahasiswa);
			Yii::app()->end();
		}
	}

	protected function performValidationAsuransi($mahasiswa)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mahasiswa-form'){
			echo CActiveForm::validate($mahasiswa,array('jumlahAsuransi'));
			Yii::app()->end();
		}
	}
}
