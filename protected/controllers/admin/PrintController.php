<?php
class PrintController extends AdminController{
	public $layout = '//layouts/print';
	public function getMoreAllowRoles() {
		return array(User::ROLE_STAFF);
	}

	public function actionIndex()
	{
		$this->layout = '//layouts/admin';
		$printKelompokForm = new PrintKelompokForm;
		$printJurusanForm = new PrintJurusanForm;
		$printAsuransiForm = new PrintAsuransiForm;

		$this->render('index',array(
			'printKelompokForm' => $printKelompokForm,
			'printJurusanForm' => $printJurusanForm,
			'printAsuransiForm' => $printAsuransiForm,
		));
	}

	public function actionKelompok()
	{
		$printKelompokForm = new PrintKelompokForm;
		if (isset($_POST['PrintKelompokForm'])) {
			$printKelompokForm->attributes = $_POST['PrintKelompokForm'];
			if (!$printKelompokForm->validate()) {
				echo CActiveForm::validate($printKelompokForm);
			}
		}
		if(isset($_POST['ajax'])) {
			Yii::app()->end();
		}
		$kelompoks = array();
		if(isset($_GET['kelompokId'])) {
			$kelompoks = array(Kelompok::model()->findByPk($_GET['kelompokId']));
		} else if($_GET['kecamatanId']) {
			$kelompoks = Kecamatan::model()->findByPk($_GET['kecamatanId'])->kelompoks;
		}

		$this->render('kelompok',array(
			'kelompoks' => $kelompoks,
		));
	}

	public function actionJurusan()
	{
		$printJurusanForm = new PrintJurusanForm;
		if (isset($_POST['PrintJurusanForm'])) {
			$printJurusanForm->attributes = $_POST['PrintJurusanForm'];
			if (!$printJurusanForm->validate()) {
				echo CActiveForm::validate($printJurusanForm);
			}
		}
		if(isset($_POST['ajax'])) {
			Yii::app()->end();
		}
		$jurusan = Jurusan::model()->findByPk($_GET['jurusanId']);
		$this->render('jurusan',array(
			'jurusan' => $jurusan,
		));
	}

	public function actionAsuransi()
	{
		$printAsuransiForm = new PrintAsuransiForm;
		if (isset($_POST['PrintAsuransiForm'])) {
			$printAsuransiForm->attributes = $_POST['PrintAsuransiForm'];
			if (!$printAsuransiForm->validate()) {
				echo CActiveForm::validate($printAsuransiForm);
			}
		}
		if(isset($_POST['ajax'])) {
			Yii::app()->end();
		}
		$jurusan = Jurusan::model()->findByPk($_GET['jurusanId']);
		$this->render('asuransi',array(
			'jurusan' => $jurusan,
		));
	}

	public function actionDosen()
	{
		$this->render('dosen',array(
			'dosens' => Dosen::model()->findAll(),
		));
	}

	public function actionDependentSelectJurusan()
	{
		echo CHtml::activeDropDownList(new PrintJurusanForm, 'jurusanId',
			CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
			array('empty' => Yii::t('app','Select Jurusan'))
		);
		Yii::app()->end();
	}

	public function actionDependentSelectJurusan2()
	{
		echo CHtml::activeDropDownList(new PrintAsuransiForm, 'jurusanId',
			CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
			array('empty' => Yii::t('app','Select Jurusan'))
		);
		Yii::app()->end();
	}

	public function actionDependentSelectKecamatan()
	{
		echo CHtml::activeDropDownList(new PrintKelompokForm,'kecamatanId',
			CHtml::listData(Kecamatan::model()->findAllByKabupatenId($_GET['kabupatenId']),'id','nama'),
			array('empty' => Yii::t('app','Select Kecamatan'))
		);
		Yii::app()->end();
	}

	public function actionDependentSelectKelompok()
	{
		echo CHtml::activeDropDownList(new PrintKelompokForm,'kelompokId',
			CHtml::listData(Kelompok::model()->findAllByKecamatanId($_GET['kecamatanId']),'id','nama'),
			array('empty' => Yii::t('app','Select Kelompok'))
		);
		Yii::app()->end();
	}
}
