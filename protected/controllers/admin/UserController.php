<?php

class UserController extends AdminController
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Displays a particular model.
	 */
	
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array(
					'admin','delete','index','view','create','update',
					'resetPassword'
				),
				'users' => array('admin'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}
	
	public function actionView()
	{
		$this->render('view',array(
			'user' => $this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$user = new User;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($user);

		if (isset($_POST['User'])) {
			$user->attributes=$_POST['User'];
			if ($user->save()) {
				$this->redirect(array('view','id' => $user->id));
			}
		}

		$this->render('create',array(
			'user' => $user,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$user = $this->loadModel();
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($user);

		if (isset($_POST['User'])) {
			$user->attributes=$_POST['User'];
			if ($user->save()) {
				$this->redirect(array('view','id' => $user->id));
			}
		}

		$this->render('update',array(
			'user' => $user,
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
		$user = new User('search');
		$user->unsetAttributes();  // clear any default values
		if (isset($_GET['User'])) {
			$user->attributes = $_GET['User'];
		}

		$this->render('index',array(
			'user' => $user,
		));
	}
	
	public function actionResetPassword()
	{
		$user = $this->loadModel();
		$this->performAjaxValidation($user);
		if(isset($_POST['User'])){
			$user->attributes = $_POST['User'];
			$user->requestNewPassword = true;
			if($user->save()){
				 Yii::app()->user->setFlash('message',Yii::t('app',
					'Password has been reset'));
				$this->redirect(array('index'));
			}
		}
		$this->render('resetPassword',array('user'=>$user));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if ($this->_model === null) {
			if (isset($_GET['id'])) {
				$this->_model = User::model()->findbyPk($_GET['id']);
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
	protected function performAjaxValidation($user)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') { 
			echo CActiveForm::validate($user);
			Yii::app()->end();
		}
	}
}
