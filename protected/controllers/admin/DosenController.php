<?php

class DosenController extends AdminController
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
		$this->render('view',array(
			'dosen' => $this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		//$dosen = new Dosen;
		$user = new User;
		// Uncomment the following line if AJAX validation is needed
		$dosen = new Dosen;
		$this->performAjaxValidation(array($dosen,$user));
		if (isset($_POST['User'])&&isset($_POST['Dosen'])) {
			$user->attributes=$_POST['User'];
			$user->username = $_POST['Dosen']['nip'];
			if ($user->save()) {
				$dosen->userId = $user->id;
				$dosen->attributes = $_POST['Dosen'];
				if($dosen->save()){
					$this->redirect(array('view','id'=>$dosen->id));
				}

			}

		}

		$this->render('create',array(
			'user' => $user,
			'dosen'=> $dosen,
		));
	}

	public function actionDependentSelectJurusan()
	{
		echo CHtml::activeDropDownList(Dosen::model(),'jurusanId',
			CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
			array('empty' => Yii::t('app','Select Jurusan'))
		);
		Yii::app()->end();
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$dosen = $this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($dosen);

		if (isset($_POST['Dosen'])) {
			$dosen->attributes=$_POST['Dosen'];
			if ($dosen->save()) {
				$this->redirect(array('view','id' => $dosen->id));
			}
		}

		$this->render('update',array(
			'dosen' => $dosen,
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
		$dosen = new Dosen('search');
		$dosen->unsetAttributes();  // clear any default values
		if (isset($_GET['Dosen'])) {
			$dosen->attributes = $_GET['Dosen'];
		}

		$this->render('index',array(
			'dosen' => $dosen,
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
				$this->_model = Dosen::model()->findbyPk($_GET['id']);
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
	protected function performAjaxValidation($dosen)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'dosen-form') {
			echo CActiveForm::validate($dosen);
			Yii::app()->end();
		}
	}
}
