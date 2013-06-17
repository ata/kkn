<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class PrintAsuransiForm extends CFormModel
{
	public $fakultasId;
	public $jurusanId;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('fakultasId, jurusanId', 'required'),
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
			'fakultasId' => Yii::t('app','Fakultas'),
			'jurusanId' => Yii::t('app','Jurusan'),
		);
	}
}
