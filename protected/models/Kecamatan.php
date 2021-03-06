<?php

/**
 * This is the model class for table "kecamatan".
 *
 * The followings are the available columns in table 'kecamatan':
 * @property string $id
 * @property string $nama
 * @property string $kabupatenId
 * @property string $created
 * @property string $modified
 *
 */
class Kecamatan extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Kecamatan the static model class
	 */
	protected $displayField = 'nama';

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kecamatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, kabupatenId', 'required'),
			array('nama', 'length', 'max'=>255),
			array('kabupatenId, programKknId', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, kabupatenId, programKknId, created, modified', 'safe', 'on'=>'search'),
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
			'kabupaten' => array(self::BELONGS_TO, 'Kabupaten', 'kabupatenId'),
			'programKkn' => array(self::BELONGS_TO, 'ProgramKkn', 'programKknId'),
			'kelompoks' => array(self::HAS_MANY, 'Kelompok', 'kecamatanId'),
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
			'kabupatenId' => Yii::t('app','Kabupaten/Kota'),
			'programKknId' => Yii::t('app','Program KKN'),
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
		$criteria->compare('kabupatenId',$this->kabupatenId);
		$criteria->compare('programKknId',$this->programKknId);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	protected function beforeSave()
	{
		$this->nama = strtoupper($this->nama);
		foreach ($this->kelompoks as $kelompok) {
			$kelompok->programKknId = $this->programKknId;
			$kelompok->save();
		}
		return parent::beforeSave();
	}



	public function findAllByKabupatenId($kabupatenId)
	{
		return $this->findAllByAttributes(array('kabupatenId' => $kabupatenId));
	}

	public function getNamaKabupaten()
	{
		return $this->kabupaten ? $this->kabupaten->nama : Yii::t('app','Belum diisi');
	}

	public function getNamaProgramKkn()
	{
		return $this->programKkn ? $this->programKkn->nama : Yii::t('app','Belum diisi');
	}

}
