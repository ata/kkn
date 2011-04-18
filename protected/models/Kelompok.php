<?php

/**
 * This is the model class for table "kelompok".
 *
 * The followings are the available columns in table 'kelompok':
 * @property string $id
 * @property string $lokasi
 * @property string $kabupatenId
 * @property string $kecamatanId
 * @property string $programKknId
 * @property string $pembimbingId
 * @property double $latitude
 * @property double $longitude
 * @property integer $jumlahAnggota
 * @property integer $jumlahLakiLaki
 * @property integer $jumlahPerempuan
 * @property integer $maxAnggota
 * @property integer $maxLakiLaki
 * @property integer $maxPerempuan
 * @property text $keterangan
 * @property string $created
 * @property string $modified
 */
class Kelompok extends ActiveRecord
{
	protected $displayField = 'nama';
	static private $_maxAnggota = null;
	static private $_maxLakiLaki = null;
	static private $_maxPerempuan = null;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Kelompok the static model class
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
		return 'kelompok';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lokasi, kabupatenId, kecamatanId, programKknId', 'required'),
			array('lokasi', 'length', 'max'=>255),
			array('latitude, longitude, pembimbingId, jumlahAnggota, jumlahLakiLaki, jumlahPerempuan, maxAnggota, maxLakiLaki, maxPerempuan', 'numerical'),
			array('kabupatenId, kecamatanId, programKknId', 'length', 'max'=>20),
			array('keterangan','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lokasi, pembimbingId, kabupatenId, kecamatanId, programKknId, jumlahAnggota, created, modified', 'safe', 'on'=>'search'),
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
			'kecamatan' => array(self::BELONGS_TO, 'Kecamatan', 'kecamatanId'),
			'programKkn' => array(self::BELONGS_TO,'ProgramKkn','programKknId'),
			'pembimbing' => array(self::BELONGS_TO,'Dosen','pembimbingId'),
			'anggota' => array(self::HAS_MANY, 'Mahasiswa','kelompokId'),
			'mahasiswa' => array(self::HAS_MANY, 'Mahasiswa','kelompokId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'lokasi' => Yii::t('app','Lokasi'),
			'pembimbingId' => Yii::t('app','Pembimbing'),
			'kabupatenId' => Yii::t('app','Kabupaten'),
			'kecamatanId' => Yii::t('app','Kecamatan'),
			'programKknId' => Yii::t('app','Program KKN'),
			'jumlahAnggota' => Yii::t('app','Jumlah Anggota'),
			'jumlahLakiLaki' => Yii::t('app','Jumlah Laki-Laki'),
			'jumlahPerempuan' => Yii::t('app','Jumlah Perempuan'),
			'maxAnggota' => Yii::t('app','Maksimal Anggota'),
			'maxLakiLaki' => Yii::t('app','Maksimal Laki-Laki'),
			'maxPerempuan' => Yii::t('app','Maksimal Perempuan'),
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
		$criteria->compare('lokasi',$this->lokasi,true);
		$criteria->compare('kabupatenId',$this->kabupatenId);
		$criteria->compare('kecamatanId',$this->kecamatanId);
		$criteria->compare('programKknId',$this->programKknId);
		$criteria->compare('pembimbingId',$this->pembimbingId);
		$criteria->compare('jumlahAnggota',$this->jumlahAnggota);
		$criteria->compare('jumlahLakiLaki',$this->jumlahLakiLaki);
		$criteria->compare('jumlahPerempuan',$this->jumlahPerempuan);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}



	protected function beforeSave()
	{
		$this->lokasi = strtoupper($this->lokasi);
		return parent::beforeSave();
	}

	/**
	 * kelompok yang di tampilkan memiliki criteria
	 * 1. Menjadi prioritas dan jumlah mahasiswa dengan jenis kelamin
	 * sama dengan mahasiswa yang mendaftarr kurang dari atau sama dengan
	 * jumlah maksimal
	 */
	public function searchAvailableKelompokOld($mahasiswa_id, $filter)
	{
		$mahasiswa = Mahasiswa::model()->findByPk($mahasiswa_id);
		$criteria = new CDbCriteria;
		if($mahasiswa->jenisKelamin == Mahasiswa::LAKI_LAKI) {
			$criteria->addCondition('t.jumlahLakiLaki < :jkmax');
			$criteria->params['jkmax'] = $this->countMaxLakiLaki();
		} else {
			$criteria->addCondition('t.jumlahPerempuan < :jkmax');
			$criteria->params['jkmax'] = $this->countMaxPerempuan();
		}
		$criteria->addCondition('t.id NOT IN (SELECT kelompokId FROM mahasiswa WHERE jurusanId = :jurusanId)');
		$criteria->addCondition('t.jumlahAnggota < :jmaxAnggota');
		$criteria->params['jurusanId'] =  $mahasiswa->jurusanId;
		$criteria->params['jmaxAnggota'] = $this->countMaxAnggota();
		// filter
		$criteria->compare('t.lokasi',$filter->lokasi,true);
		$criteria->compare('t.kabupatenId',$filter->kabupatenId);
		$criteria->compare('t.kecamatanId',$filter->kecamatanId);
		$criteria->compare('t.programKknId',$filter->programKknId);
		$criteria->with = array('kabupaten','kecamatan','programKkn');

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function searchAvailable($level = 1)
	{
		$currentMahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
		$criteria = new CDbCriteria;
		$criteria->compare('t.lokasi',$this->lokasi,true);
		$criteria->compare('t.kabupatenId',$this->kabupatenId);
		$criteria->compare('t.kecamatanId',$this->kecamatanId);
		$criteria->compare('t.programKknId',$this->programKknId);
		if($currentMahasiswa->jenisKelamin == Mahasiswa::LAKI_LAKI) {
			$criteria->addCondition('t.jumlahLakiLaki < :jkmax');
			$criteria->params['jkmax'] = $this->countMaxLakiLaki();
		} else {
			$criteria->addCondition('t.jumlahPerempuan < :jkmax');
			$criteria->params['jkmax'] = $this->countMaxPerempuan();
		}
		$criteria->addCondition('t.jumlahAnggota < :jmaxAnggota');
		$criteria->params['jmaxAnggota'] = $this->countMaxAnggota();
		$criteria->addCondition('t.id NOT IN (SELECT kelompokId FROM mahasiswa WHERE jurusanId = :jurusanId AND kelompokId IS NOT NULL)');
		$criteria->params['jurusanId'] =  $currentMahasiswa->jurusanId;

		if ($level <= 5) {
			$criteria->addCondition('t.programKknId IN (SELECT programKknId FROM prioritas WHERE jurusanId = :jurusanId AND level = :level)');
			$criteria->params['level'] =  $level;
		}

		$criteria->with = array('kabupaten','kecamatan','programKkn','programKkn.prioritas');

		$count = $this->count($criteria);

		if ($count == 0) {
			return $this->searchAvailable($level + 1);
		}

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function availableDPChoice()
	{
		$criteria=new CDbCriteria;
		$criteria->with = array('kabupaten','kecamatan');
		$criteria->order = 't.jumlahAnggota';
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 20
			)
		));
	}


	public function pilih($mahasiswa_id)
	{
		$mahasiswa = Mahasiswa::model()->findByPk($mahasiswa_id);
		$mahasiswa->kelompokId = $this->id;
		$mahasiswa->save(false);

		$this->jumlahAnggota ++;
		if($mahasiswa->jenisKelamin == Mahasiswa::LAKI_LAKI) {
			$this->jumlahLakiLaki ++;
		} else {
			$this->jumlahPerempuan ++;
		}
		$this->save();

	}


	public function countMaxAnggota()
	{
		return self::$_maxAnggota !== null?self::$_maxAnggota:self::$_maxAnggota = ceil(Mahasiswa::model()->count() / $this->count());
	}

	public function countMaxLakiLaki()
	{
		return ceil(Mahasiswa::model()->countLakiLaki() / $this->count());
	}

	public function countMaxPerempuan()
	{
		return ceil(Mahasiswa::model()->countPerempuan() / $this->count());
	}

	public function getIsPenuh()
	{
		return $this->jumlahAnggota >= $this->countMaxAnggota();
	}

	public function getNama()
	{
		if ($this->programKkn !== null) {
			return "[{$this->programKkn->nama}] {$this->lokasi}";// someting
		} else {
			$this->lokasi;
		}
	}

	public function getNamaProgramKkn()
	{
		return $this->programKkn ? $this->programKkn->nama : Yii::t('app','Belum ditetapkan');
	}

	public function getNamaPembimbing()
	{
		return $this->pembimbing ? $this->pembimbing->namaLengkap : Yii::t('app','Belum ditetapkan');
	}

	public function getNamaKabupaten()
	{
		return $this->kabupaten ? $this->kabupaten->nama : Yii::t('app','Belum diisi');
	}

	public function getNamaKecamatan()
	{
		return $this->kecamatan ? $this->kecamatan->nama : Yii::t('app','Belum diisi');
	}

	public function getJumlahAnggotaDisplay()
	{
		return "{$this->jumlahAnggota} orang ({$this->jumlahLakiLaki} laki-laki, {$this->jumlahLakiLaki} perempuan)";
	}

}
