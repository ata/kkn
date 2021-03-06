<?php

/**
 * This is the model class for table "fakultas".
 *
 * The followings are the available columns in table 'fakultas':
 * @property string $id
 * @property string $nama
 * @property string $kode
 * @property string $created
 * @property string $modified
 */
class Fakultas extends ActiveRecord
{
	protected $displayField = 'nama';
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fakultas the static model class
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
		return 'fakultas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, kode', 'required'),
			array('nama, kode', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, kode, created, modified', 'safe', 'on'=>'search'),
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
			'dosen' => array(self::HAS_MANY,'Dosen','fakultasId'),
			'jurusan' => array(self::HAS_MANY,'Jurusan','fakultasId'),
			'programStudi' => array(self::HAS_MANY,'ProgramStudi','fakultasId'),
			'mahasiswa' => array(self::HAS_MANY,'Mahasiswa','fakultasId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'nama' => Yii::t('app','Nama'),
			'kode' => Yii::t('app','Kode'),
			'created' => Yii::t('app','Created'),
			'modified' => Yii::t('app','Modified'),
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
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	protected function beforeSave()
	{
		$this->nama = strtoupper($this->nama);
		return parent::beforeSave();
	}


	public function getCountMahasiswa()
	{
		return Mahasiswa::model()->count('fakultasId = :id',array('id' => $this->id));
	}

	private $_staticMahasiswa;

	public function getStaticMahasiswa()
	{
		return $this->_staticMahasiswa?$this->_staticMahasiswa:$this->_staticMahasiswa =
				CHtml::listData($this->findAll(), 'kode', 'countMahasiswa');

	}
}
