<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('index','view','delete','create','update'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'<?php echo $this->singularName; ?>'=>$this->load<?php echo $this->modelClass; ?>($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$<?php echo $this->singularName; ?>=new <?php echo $this->modelClass; ?>;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($<?php echo $this->singularName; ?>);

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$<?php echo $this->singularName; ?>->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if($<?php echo $this->singularName; ?>->save())
				$this->redirect(array('view','id'=>$<?php echo $this->singularName; ?>-><?php echo $this->tableSchema->primaryKey; ?>));
		}

		$this->render('create',array(
			'<?php echo $this->singularName; ?>'=>$<?php echo $this->singularName; ?>,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$<?php echo $this->singularName; ?>=$this->load<?php echo $this->modelClass; ?>($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($<?php echo $this->singularName; ?>);

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$<?php echo $this->singularName; ?>->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if($<?php echo $this->singularName; ?>->save())
				$this->redirect(array('view','id'=>$<?php echo $this->singularName; ?>-><?php echo $this->tableSchema->primaryKey; ?>));
		}

		$this->render('update',array(
			'<?php echo $this->singularName; ?>'=>$<?php echo $this->singularName; ?>,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->load<?php echo $this->modelClass; ?>($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,Yii::t('app','Invalid request. Please do not repeat this request again.'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$<?php echo $this->singularName; ?>=new <?php echo $this->modelClass; ?>('search');
		$<?php echo $this->singularName; ?>->unsetAttributes();  // clear any default values
		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$<?php echo $this->singularName; ?>->attributes=$_GET['<?php echo $this->modelClass; ?>'];

		$this->render('index',array(
			'<?php echo $this->singularName; ?>'=>$<?php echo $this->singularName; ?>,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function load<?php echo $this->modelClass; ?>($id)
	{
		$<?php echo $this->singularName; ?>=<?php echo $this->modelClass; ?>::model()->findByPk((int)$id);
		if($<?php echo $this->singularName; ?>===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $<?php echo $this->singularName; ?>;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($<?php echo $this->singularName; ?>)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($<?php echo $this->singularName; ?>);
			Yii::app()->end();
		}
	}
}
