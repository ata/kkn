<?php

class AsuransiController extends AdminController
{
	public function getMoreAllowRoles() {
		return array(User::ROLE_STAFF);
	}

	public function actionIndex()
	{
		$asuransi = Yii::app()->session->get('AsuransiForm', new AsuransiForm);
		if(isset($_POST['AsuransiForm'])) {
			$asuransi->attributes = $_POST['AsuransiForm'];
			if($asuransi->validate()) {
				Yii::app()->session->add('AsuransiForm',$asuransi);
				$this->redirect(array('preview'));
			}
		}
		$this->render('index',array(
			'asuransi' => $asuransi,
		));
	}

	public function actionPreview()
	{
		$asuransi =  Yii::app()->session->get('AsuransiForm');
		$this->render('preview',array(
			'asuransi' => $asuransi,
		));
	}

	public function actionLunasi()
	{
		$asuransi =  Yii::app()->session->get('AsuransiForm');
		$asuransi->lunasi();
		Yii::app()->session->remove('AsuransiForm');
		Yii::app()->user->setFlash('lunas',Yii::t('app','Pelunasan Asuransi Sukses'));
		$this->redirect(array('index'));
	}

	public function actionCancel()
	{
		Yii::app()->session->remove('AsuransiForm');
		$this->redirect(array('index'));
	}
}
