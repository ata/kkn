<?php

class SettingController extends AdminController
{
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
			'setting' => $this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$setting = new Setting;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($setting);

		if (isset($_POST['Setting'])) {
			$setting->attributes=$_POST['Setting'];
			if ($setting->save()) {
				$this->redirect(array('view','id' => $setting->id));
			}
		}

		$this->render('create',array(
			'setting' => $setting,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$setting = $this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($setting);

		if (isset($_POST['Setting'])) {
			$setting->attributes=$_POST['Setting'];
			if ($setting->save()) {
				$this->redirect(array('view','id' => $setting->id));
			}
		}

		$this->render('update',array(
			'setting' => $setting,
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
		$setting = new Setting('search');
		$setting->unsetAttributes();  // clear any default values
		if (isset($_GET['Setting'])) {
			$setting->attributes = $_GET['Setting'];
		}

		$this->render('index',array(
			'setting' => $setting,
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
				$this->_model = Setting::model()->findbyPk($_GET['id']);
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
	protected function performAjaxValidation($setting)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'setting-form') {
			echo CActiveForm::validate($setting);
			Yii::app()->end();
		}
	}
}
