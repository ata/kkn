<?php

/**
 * This is the model class for table "program_kkn_lampiran".
 *
 * The followings are the available columns in table 'program_kkn_lampiran':
 * @property integer $id
 * @property string $nama
 * @property string $path
 * @property string $mimetype
 * @property double $size
 * @property integer $programKknId
 *
 * The followings are the available model relations:
 * @property ProgramKkn $programKkn
 */
class ProgramKknLampiran extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProgramKknLampiran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'program_kkn_lampiran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('programKknId', 'numerical', 'integerOnly'=>true),
			array('size','numerical'),
			array('nama, path, mimetype', 'length', 'max'=>255),
			array('created, modified','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, path, programKknId', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'programKkn' => array(self::BELONGS_TO, 'ProgramKkn', 'programKknId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'path' => 'Path',
			'programKknId' => 'Program Kkn',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('programKknId',$this->programKknId);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function getCountLampiran($programKknId)
	{
		return $this->count('programKknId = :id',array('id'=>$programKknId));
	}
}
