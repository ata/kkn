<?php
class AsuransiForm extends CFormModel
{
	public $stringNIM;
	public $arrayNIM;

	public function rules()
	{
		return array(
			array('stringNIM', 'required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'stringNIM' => Yii::t('app','NIM'),
		);
	}


	protected function beforeValidate()
	{
		preg_match_all('([0-9]+)',$this->stringNIM,$nims);
		$this->arrayNIM = $nims[0];
		return parent::beforeValidate();
	}

	public function preview()
	{
		$criteria = new CDbCriteria;
		$criteria->addInCondition('nim',$this->arrayNIM);
		return new CActiveDataProvider('Mahasiswa', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>50
			),
		));
	}

	public function lunasi()
	{
		$criteria = new CDbCriteria;
		$criteria->addInCondition('nim',$this->arrayNIM);
		foreach(Mahasiswa::model()->findAll($criteria) as $mahasiswa) {
			$mahasiswa->lunasiAsuransi();
		}
	}
}
