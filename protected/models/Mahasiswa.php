<?php

/**
 * This is the model class for table "mahasiswa".
 *
 * The followings are the available columns in table 'mahasiswa':
 * @property string $id
 * @property string $namaLengkap
 * @property string $nim
 * @property string $alamatAsal
 * @property string $alamatTinggal
 * @property string $fakultasId
 * @property string $jurusanId
 * @property string $kelompokId
 * @property string $jenjangId
 * @property integer $jenisKelamin
 * @property string $phone1
 * @property string $phone2
 * @property string $photoPath
 * @property boolean $registered
 * @property integer userId
 * @property double $jumlahAsuransi
 * @property double $lunasAsuransi
 * @property string $created
 * @property string $modified
 */
class Mahasiswa extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mahasiswa the static model class
	 */
	const PEREMPUAN = 'PEREMPUAN';
	const LAKI_LAKI = 'LAKI-LAKI';
	const ASURANSI_LUNAS = '1';
	const ASURANSI_BELUM_LUNAS = '0';

	public $password;
	public $confirmPassword;
	public $email;
	public $verifyCode;
	public $file;
	public $update = false;
	public $inputCaptcha = true;
	public $registered;

	// untuk dependent kelompok
	public $kabupatenId;
	public $kecamatanId;
	public $isAdmin = false;


	private static $_countLakiLaki;
	private static $_countPerempuan;
	private static $_cacheCount;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mahasiswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, confirmPassword, email, tempatLahir, tanggalLahir,namaLengkap, phone1, phone2, nim, alamatAsal, alamatTinggal, fakultasId, jurusanId, jenjangId, jenisKelamin', 'required'),
			array('userId, registered, jumlahAsuransi', 'numerical', 'integerOnly'=>true),
			array('nim', 'numerical'),
			array('email','email'),
			array('jenisKelamin, namaLengkap, phone1, alamatAsal, alamatTinggal', 'length', 'max'=>255),
			array('userId, fakultasId, nim, jurusanId, kelompokId, jenjangId', 'length', 'max'=>20),
			array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd') || $this->update || !$this->inputCaptcha),
			array('file', 'file', 'types'=>'jpg, jpeg, png, gif','allowEmpty' => true),
			array('kabupatenId, kecamatanId, lunasAsuransi','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, namaLengkap, nim, registered, alamatAsal, alamatTinggal, fakultasId, jurusanId, kelompokId, jenjangId, jenisKelamin, created, modified', 'safe', 'on'=>'search'),
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
			'jenjang' => array(self::BELONGS_TO, 'Jenjang','jenjangId'),
			'fakultas' => array(self::BELONGS_TO, 'Fakultas','fakultasId'),
			'jurusan' => array(self::BELONGS_TO, 'Jurusan','jurusanId'),
			'kelompok' => array(self::BELONGS_TO, 'Kelompok','kelompokId'),
			'user' => array(self::BELONGS_TO, 'User','userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'namaLengkap' => Yii::t('app','Nama Lengkap'),
			'nim' => Yii::t('app','NIM'),
			'alamatAsal' => Yii::t('app','Alamat Asal'),
			'alamatTinggal' => Yii::t('app','Alamat Tinggal'),
			'fakultasId' => Yii::t('app','Fakultas'),
			'jurusanId' => Yii::t('app','Jurusan'),
			'kabupatenId' => Yii::t('app','Kabupaten'),
			'kecamatanId' => Yii::t('app','Kecamatan'),
			'kelompokId' => Yii::t('app','Kelompok'),
			'jenjangId' => Yii::t('app','Jenjang'),
			'jenisKelamin' => Yii::t('app','Jenis Kelamin'),
			'displayJenisKelamin' => Yii::t('app','Jenis Kelamin'),
			'phone1' => Yii::t('app','Telp/HP Pribadi'),
			'phone2' => Yii::t('app','Telp/HP Keluarga'),
			'password' => Yii::t('app','Password'),
			'confirmPassword' => Yii::t('app','Confirm Password'),
			'jumlahAsuransi'=>Yii::t('app','Jumlah Asuransi'),
			'lunasAsuransi'=>Yii::t('app','Lunah Asuransi'),
			'created' => Yii::t('app','Created'),
			'modified' => Yii::t('app','Modified'),
			'namaKelompok' => Yii::t('app','Kelompok'),
			'namaKabupaten' => Yii::t('app','Kabupaten'),
			'namaKecamatan' => Yii::t('app','Kecamatan'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($pageSize = 10, $order = 'id')
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('namaLengkap',$this->namaLengkap, true);
		$criteria->compare('nim',$this->nim);
		$criteria->compare('alamatAsal',$this->alamatAsal,true);
		$criteria->compare('alamatTinggal',$this->alamatTinggal,true);
		$criteria->compare('fakultasId',$this->fakultasId);
		$criteria->compare('jurusanId',$this->jurusanId);
		$criteria->compare('kelompokId',$this->kelompokId);
		$criteria->compare('jenjangId',$this->jenjangId);
		$criteria->compare('jenisKelamin',$this->jenisKelamin);
		$criteria->compare('lunasAsuransi',$this->lunasAsuransi);
		$criteria->compare('jumlahAsuransi',$this->jumlahAsuransi);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		if($this->registered !== null) {
			if($this->registered == 0) {
				$criteria->addCondition('userId is NULL');
			} else if($this->registered == 1){
				$criteria->addCondition('userId is NOT NULL');
			}
		}
		$criteria->order = $order;

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => $pageSize
			)
		));
	}

	protected function afterValidate()
	{

		if(!$this->update && User::model()->findByAttributes(array('email' => $this->email))){
			$this->addError('email',Yii::t('app','Email Sudah digunakan'));
		}
		if($this->update){
			if(empty($this->password)){
				$this->clearErrors('password');
				$this->clearErrors('confirmPassword');
			}

		}
		return parent::afterValidate();
	}

	protected function beforeSave()
	{
		$this->namaLengkap = strtoupper($this->namaLengkap);
		if(!$this->isAdmin){
			$this->saveUser();
		}
		return parent::beforeSave();
	}

	protected function afterSave()
	{
		return parent::afterSave();
	}

	protected function afterFind()
	{
		if($this->user){
			$this->email = $this->user->email;
		}
		parent::afterFind();
	}

	private function saveUser()
	{
		if ($this->user === null) {
			$this->user = new User;
		}
		$this->user->username = $this->nim;
		$this->user->email = $this->email;
		$this->user->role = User::ROLE_MAHASISWA;
		if(!empty($this->password)){
			$this->user->password = $this->password;
			$this->user->confirmPassword = $this->confirmPassword;
			if($this->update == true){
				$this->user->requestNewPassword = true;
			}
		}
		$this->user->nama = $this->namaLengkap;
		if ($this->user->save()) {
			$this->userId = $this->user->id;
		} else {
			var_dump($this->user->errors);
			die();
		}

	}

	public function findByUserId($userId)
	{
		return $this->findByAttributes(array('userId' => $userId));
	}

	public function findByNIM($nim)
	{
		return $this->findByAttributes(array('nim' => $nim));
	}

	public function cacheCount()
	{
		return self::$_cacheCount !== null ? self::$_cacheCount : $this->count();
	}

	public function countLakiLaki()
	{
		return self::$_countLakiLaki !== null?self::$_countLakiLaki
			:self::$_countLakiLaki = $this->count('jenisKelamin = :jk',
				array('jk' => self::LAKI_LAKI));
	}

	public function countPerempuan()
	{
		return self::$_countPerempuan !== null?self::$_countPerempuan
			:self::$_countPerempuan = $this->count('jenisKelamin = :jk',
				array('jk' => self::PEREMPUAN));
	}


	public function getKodeJenjang()
	{
		return $this->jenjang?$this->jenjang->kode:Yii::t('app','Belum diisi');
	}
	public function getKodeFakultas()
	{
		return $this->fakultas?$this->fakultas->kode:Yii::t('app','Belum diisi');
	}
	public function getKodeJurusan()
	{
		return $this->jurusan?$this->jurusan->kode:Yii::t('app','Belum diisi');
	}
	public function getNamaJurusan()
	{
		return $this->jurusan?$this->jurusan->nama:Yii::t('app','Belum diisi');
	}
	public function getNamaFakultas()
	{
		return $this->fakultas?$this->fakultas->nama:Yii::t('app','Belum diisi');
	}
	public function getDisplayJenisKelamin()
	{
		return $this->jenisKelamin==self::LAKI_LAKI?Yii::t('app','Laki-laki'):Yii::t('app','Perempuan');
	}
	public function getNamaKelompok()
	{
		return $this->kelompok?$this->kelompok->nama:Yii::t('app','Belum diisi');
	}
	public function getNamaKabupaten()
	{
		return $this->kelompok?$this->kelompok->namaKabupaten:Yii::t('app','Belum diisi');
	}
	public function getNamaKecamatan()
	{
		return $this->kelompok?$this->kelompok->namaKecamatan:Yii::t('app','Belum diisi');
	}

	public function getNama()
	{
		return $this->namaLengkap;
	}

	public function getStatusAsuransi()
	{
		return $this->lunasAsuransi ? Yii::t('app','Lunas') : Yii::t('app','Belum Lunas');
	}

	public function unsetKelompok()
	{
		$this->kelompok->jumlahAnggota --;
		if($this->jenisKelamin == self::LAKI_LAKI) {
			$this->kelompok->jumlahLakiLaki --;
		} else {
			$this->kelompok->jumlahPerempuan --;
		}
		$this->kelompok->save(false);
		$this->kelompokId = null;
		$this->isAdmin = true;
		$this->save(false);
	}

	public function getIsRegistered()
	{
		if($this->user == null) {
			return false;
		}
		return true;
	}

	public function getRegisteredLabel()
	{
		return $this->isRegistered ? Yii::t('app','Sudah Registrasi') : Yii::t('app','Belum Registrasi');
	}

	public function findNimAutocomplete($nim)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'id,nim';
		$criteria->condition = 'nim like "%$nim%"';

		return $this->find($criteria);
	}

	public function unsetMahasiswaKelompok()
	{
		return $this->update(array('kelompokId' => null));
	}

	public function countTerdaftar()
	{
		return $this->count('userId IS NOT NULL');
	}
	public function countKelompokNull()
	{
		return $this->count('userId IS NOT NULL AND kelompokId IS NULL');
	}
	public function lunasiAsuransi()
	{
		$this->jumlahAsuransi = Setting::model()->get('JUMLAH_ASURANSI',15000);
		$this->lunasAsuransi = true;
		$this->save(false);
	}
}
