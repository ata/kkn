<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class PrintKelompokForm extends CFormModel
{
	public $kabupatenId;
	public $kecamatanId;
	public $kelompokId;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('kabupatenId, kecamatanId', 'required'),
			array('kelompokId','safe'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'kabupatenId' => Yii::t('app','Kabupaten'),
			'kecamatanId' => Yii::t('app','Kecamatan'),
			'kelompokId' => Yii::t('app','Kelompok'),
		);
	}
}
