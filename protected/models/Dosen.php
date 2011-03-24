<?php

/**
 * This is the model class for table "dosen".
 *
 * The followings are the available columns in table 'dosen':
 * @property integer $id
 * @property string $nip
 * @property string $namaLengkap
 * @property string $jenisKelamin
 * @property integer $userId
 * @property integer $fakultasId
 * @property integer $jurusanId
 * @property string $kontak
 * @property string $created
 * @property string $modified
 */
class Dosen extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Dosen the static model class
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
		return 'dosen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nip, namaLengkap, jenisKelamin', 'required'),
			array('userId, fakultasId, jurusanId', 'numerical', 'integerOnly'=>true),
			array('nip, namaLengkap, jenisKelamin, kontak', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nip, namaLengkap, jenisKelamin, userId, fakultasId, jurusanId, kontak, created, modified', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO,'User','userId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nip' => 'Nip',
			'namaLengkap' => 'Nama Lengkap',
			'jenisKelamin' => 'Jenis Kelamin',
			'userId' => 'User',
			'fakultasId' => 'Fakultas',
			'jurusanId' => 'Jurusan',
			'kontak' => 'Kontak',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('namaLengkap',$this->namaLengkap,true);
		$criteria->compare('jenisKelamin',$this->jenisKelamin,true);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('fakultasId',$this->fakultasId);
		$criteria->compare('jurusanId',$this->jurusanId);
		$criteria->compare('kontak',$this->kontak,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function getNama()
	{
		return $this->namaLengkap;
	}
}
