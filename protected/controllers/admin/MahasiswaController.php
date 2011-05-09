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
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		/*$mahasiswa = new Mahasiswa('search');
		$mahasiswa->unsetAttributes();  // clear any default values
		if (isset($_GET['Mahasiswa'])) {
			$mahasiswa->attributes = $_GET['Mahasiswa'];
		}

		$this->render('index',array(
			'mahasiswa' => $mahasiswa,
		));*/
		
	}

	public function actionDependentSelectJurusan()
	{

		/*echo CHtml::activeDropDownList(Mahasiswa::model(),'jurusanId', 

		echo CHtml::activeDropDownList(Mahasiswa::model(),'jurusanId',
			CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
			array('empty' => Yii::t('app','Select Jurusan'))
		);*/
		foreach (Jurusan::model()->findAllByFakultasId($_GET['fakultasId']) as $data){
			$option = array();
			$option['id'] = $data->id;
			$option['nama'] = $data->nama;
			echo json_encode($option);
		}
		
		
		Yii::app()->end();
	}
	
	/*public function actionBayarAsuransi()
	{
		$mahasiswa = new Mahasiswa('search');
		//$mahasiswa->unsetAttributes();
		if(isset($_POST['id'])){
			$mahasiswa->id = $_POST['id'];
		}

		$this->performValidationAsuransi($mahasiswa);

		$flag = true;
		if(isset($_POST['Mahasiswa'])){
			$flag = false;
			$mahasiswa->attributes = $_POST['Mahasiswa'];
			$mahasiswa->lunasAsuransi = Mahasiswa::ASURANSI_LUNAS;
			$mahasiswa->inputCaptcha = false;
			/*if($mahasiswa->save()){
				echo "masuk";
			} else {
				echo "tidak";
			}*/
			/*var_dump($mahasiswa->attributes);
		}

		if($flag){
			$this->renderPartial('bayarAsuransi',array('mahasiswa'=>$mahasiswa),false,true);
		}
	}*/
	
	public function actionBayarAsuransi()
	{
		$mahasiswa = new Mahasiswa('search');
		
		$this->render('bayar',array('mahasiswa'=>$mahasiswa));
	}
	
	public function actionFindNim()
	{
		if(isset($_GET['q'])){
			$qtxt ="SELECT id,nim FROM mahasiswa WHERE nim LIKE :nim";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":nim", '%'.$_GET['q'].'%', PDO::PARAM_STR);
			$res =$command->queryAll();
			//print_r($res);
			$val1 = array('id','name');
			$test = array();
			foreach($res as $data){
				$tests = array('id'=>$data['id'],'name'=>$data['nim']);
				$test[] = $tests; 
			}
			$json_response = json_encode($test);
			
			echo $json_response;
			//echo json_encode('{id:7,name:test}');
		}
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
