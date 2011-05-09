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
	private static $_maxAnggota = null;
	private static $_maxLakiLaki = null;
	private static $_maxPerempuan = null;
	private static $_cacheCount;
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
			array('lokasi, kabupatenId, kecamatanId, programKknId, maxAnggota', 'required'),
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


	public function getAvailableCriteria($currentMahasiswa, $level)
	{
		$criteria = new CDbCriteria;
		$criteria->compare('t.lokasi',$this->lokasi,true);
		$criteria->compare('t.kabupatenId',$this->kabupatenId);
		$criteria->compare('t.kecamatanId',$this->kecamatanId);
		$criteria->compare('t.programKknId',$this->programKknId);
		if($currentMahasiswa->jenisKelamin == Mahasiswa::LAKI_LAKI) {
			$criteria->addCondition('(t.jumlahLakiLaki < FLOOR(:ratio * t.maxAnggota) AND t.maxLakiLaki IS NULL AND t.maxAnggota IS NOT NULL)
									OR (t.jumlahLakiLaki < t.maxLakiLaki AND t.maxLakiLaki IS NOT NULL)
									OR t.jumlahLakiLaki IS NULL');
			//$criteria->addCondition('t.jumlahLakiLaki < :jkmax OR t.jumlahLakiLaki IS NULL');
			//$criteria->params['jkmax'] = $this->countMaxLakiLaki();
			$criteria->params['ratio'] = $this->countRatioLakiLaki();
		} else {
			$criteria->addCondition('(t.jumlahPerempuan < CEIL(:ratio * t.maxAnggota) AND t.maxPerempuan IS NULL AND t.maxAnggota IS NOT NULL)
									OR (t.jumlahPerempuan < t.maxPerempuan AND t.maxPerempuan IS NOT NULL)
									OR t.jumlahPerempuan IS NULL');
			//$criteria->addCondition('t.jumlahPerempuan < :jkmax OR t.jumlahPerempuan IS NULL');
			//$criteria->params['jkmax'] = $this->countMaxPerempuan();
			$criteria->params['ratio'] = $this->countRatioPerempuan();
		}

		$criteria->addCondition('(t.jumlahAnggota < :jmaxAnggota AND t.maxAnggota IS NULL)
									OR (t.jumlahAnggota < t.maxAnggota AND t.maxAnggota IS NOT NULL)
									OR t.jumlahAnggota IS NULL');
		$criteria->params['jmaxAnggota'] = $this->countMaxAnggota();
		if ($level <= 5) {
			$criteria->addCondition('(t.programKknId IN (SELECT programKknId FROM prioritas WHERE jurusanId = :jurusanId AND level = :level))
										AND((SELECT count(*) FROM mahasiswa WHERE kelompokId = t.id AND jurusanId = :jurusanId)
										< (SELECT count(*) FROM prioritas WHERE jurusanId = :jurusanId AND level = :level))');
			$criteria->params['level'] =  $level;
		} else {
			if($level <= 6) {
				$criteria->addCondition('t.programKknId NOT IN (SELECT programKknId FROM prioritas)');
			}
			if($level <= 7) {
				$criteria->addCondition('t.id NOT IN (SELECT kelompokId FROM mahasiswa WHERE jurusanId = :jurusanId AND kelompokId IS NOT NULL)');
			}

		}
		$criteria->params['jurusanId'] =  $currentMahasiswa->jurusanId;
		$criteria->order = 't.jumlahAnggota DESC';
		$criteria->limit = 20;
		$criteria->with = array('kabupaten','kecamatan','programKkn','programKkn.prioritas');
		return $criteria;
	}

	private $_loopSearch = 0;

	public function searchAvailable(Mahasiswa $currentMahasiswa, $level = 1)
	{
		$criteria = $this->getAvailableCriteria($currentMahasiswa, $level);
		$count = $this->count($criteria);
		if ($count == 0 && $this->_loopSearch < 20) {
			$this->_loopSearch ++;
			return $this->searchAvailable($currentMahasiswa, $level + 1);
		}
		Yii::app()->session->add('Prioritas_level', $level);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'totalItemCount' => $this->calculateTotalCountItem($criteria),
		));
	}

	public function calculateTotalCountItem($criteria)
	{
		$count = $this->count($criteria);
		if($count < 30) {
			return $count;
		}
		return 30;
	}


	public function findByUserIdPembimbing($user_id)
	{
		$criteria = new CDbCriteria;
		$criteria->compare('user.id',$user_id);
		$criteria->with = array('pembimbing','pembimbing.user');
		return $this->find($criteria);
	}

	public function findAllByKecamatanId($kecamatanId)
	{
		return $this->findAllByAttributes(array(
			'kecamatanId' => $kecamatanId
		));
	}

	public function pilih(Mahasiswa $currentMahasiswa)
	{
		$currentMahasiswa->kelompokId = $this->id;
		$level = (int) Yii::app()->session->get('Prioritas_level');
		$criteria = $this->getAvailableCriteria($currentMahasiswa, $level);
		$criteria->compare('t.id', $this->id);
		if ($this->count($criteria) == 0) {
			return false;
		}
		$currentMahasiswa->save(false);
		$this->jumlahAnggota ++;
		if($currentMahasiswa->jenisKelamin == Mahasiswa::LAKI_LAKI) {
			$this->jumlahLakiLaki ++;
		} else {
			$this->jumlahPerempuan ++;
		}
		$this->save();
		return true;
	}


	public function cacheCount()
	{
		return self::$_cacheCount !== null ? self::$_cacheCount : $this->count();
	}

	/**
	 * Merupakan Jumlah maksimal anggota dalam satu kelompok
	 * Jika jumlah maxAnggota di isi, maka akan mengembalikan jumlah anggota
	 * Jika jumlah anggota tidak diisi, maka akan di cek jumlah kelompok
	 * Jika jumlah kelompok adalah nol, maka akan mengembalikan 1
	 * (agar pembagi tetap 1 dan tidak keluar error),
	 * Jika jumlah kelompok tidak nol, maka lakukan perhitungan:
	 * 		Jumlah Maksimal Anggota = ceil(Jumlah Mahasiswa / jumlah kelompok kkn)
	 */

	public function countMaxAnggota()
	{
		if ($this->cacheCount() == 0) {
			return 0;
		}
		return self::$_maxAnggota !== null?self::$_maxAnggota:self::$_maxAnggota = ceil(Mahasiswa::model()->cacheCount() / $this->cacheCount());
	}

	/**
	 * Merupakan Jumlah maksimal Laki-laki dalam satu kelompok
	 * jika $this->maxLakiLaki didefinisikan, maka kembalikan nilai $this->maxLakiLaki
	 *
	 */
	public function countMaxLakiLaki()
	{
		if ($this->cacheCount() == 0) {
			return 0;
		}
		return floor(Mahasiswa::model()->countLakiLaki() / Mahasiswa::model()->cacheCount() * $this->countMaxAnggota());
	}

	public function countRatioLakiLaki()
	{
		return $this->countMaxLakiLaki() / $this->countMaxAnggota();
	}

	public function countRatioPerempuan()
	{
		return $this->countMaxPerempuan() / $this->countMaxAnggota();
	}

	public function countMaxPerempuan()
	{
		if ($this->cacheCount() == 0) {
			return 0;
		}
		return ceil(Mahasiswa::model()->countPerempuan() / Mahasiswa::model()->cacheCount() * $this->countMaxAnggota());
	}

	public function getIsPenuh()
	{
		return $this->jumlahAnggota >= $this->countMaxAnggota();
	}

	public function getNama()
	{
		if ($this->programKkn !== null) {
			return "[{$this->programKkn->nama}] {$this->lokasi}";
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

	public function getUser()
	{
		return Yii::app()->user;
	}

}
