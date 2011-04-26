<?php

class JurusanController extends AdminController
{
	public function getMoreAllowRoles() {
		return array(User::ROLE_STAFF);
	}
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public function actionView()
	{
		$jurusan = $this->loadModel();
		$mahasiswa = new Mahasiswa('search');
		$mahasiswa->unsetAttributes();
		$mahasiswa->jurusanId = $jurusan->id;
		if (isset($_GET['Mahasiswa'])) {
			$mahasiswa->attributes = $_GET['Mahasiswa'];
		}
		$this->render('view',array(
			'jurusan' => $jurusan,
			'mahasiswa' => $mahasiswa,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionMahasiswaPrint()
	{
		//var_dump($_POST);
		$this->layout = false;
		$mahasiswa = new Mahasiswa('search');
		$mahasiswa->unsetAttributes();
		if(isset($_GET['Mahasiswa']) && isset($_GET['jurusanId'])){
			$mahasiswa->jurusanId = $_GET['jurusanId'];
			$mahasiswa->attributes = $_GET['Mahasiswa'];

			$dataProvider = $mahasiswa->search();
			$dataProvider->pagination = false;


		}

		$this->render('mahasiswaPrint',array('mahasiswa'=>$dataProvider->getData()));
	}
	public function actionCreate()
	{
		$jurusan = new Jurusan;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($jurusan);

		if (isset($_POST['Jurusan'])) {
			$jurusan->attributes=$_POST['Jurusan'];
			if ($jurusan->save()) {
				$this->redirect(array('view','id' => $jurusan->id));
			}
		}

		$this->render('create',array(
			'jurusan' => $jurusan,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$jurusan = $this->loadModel();
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($jurusan);

		if (isset($_POST['Jurusan'])) {
			$jurusan->attributes=$_POST['Jurusan'];
			if ($jurusan->save()) {
				$this->redirect(array('view','id' => $jurusan->id));
			}
		}

		$this->render('update',array(
			'jurusan' => $jurusan,
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

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$jurusan = new Jurusan('search');
		$jurusan->unsetAttributes();  // clear any default values
		if (isset($_GET['Jurusan'])) {
			$jurusan->attributes = $_GET['Jurusan'];
		}

		$this->render('index',array(
			'jurusan' => $jurusan,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if ($this->_model === null) {
			if (isset($_GET['id'])) {
				$this->_model = Jurusan::model()->findbyPk($_GET['id']);
			}
			if ($this->_model === null) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($jurusan)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'jurusan-form') {
			echo CActiveForm::validate($jurusan);
			Yii::app()->end();
		}
	}
}
