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
 * @property string $latitude
 * @property string $longitude
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
            array('latitude, longitude, jumlahAnggota, jumlahLakiLaki, jumlahPerempuan', 'numerical'),
            array('kabupatenId, kecamatanId, programKknId', 'length', 'max'=>20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, lokasi, kabupatenId, kecamatanId, programKknId, jumlahAnggota, created, modified', 'safe', 'on'=>'search'),
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
            'anggota' => array(self::HAS_MANY, 'Mahasiswa','kelompokId'),
            'programKkn' => array(self::BELONGS_TO,'ProgramKkn','programKknId'),
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
            'kabupatenId' => Yii::t('app','Kabupaten'),
            'kecamatanId' => Yii::t('app','Kecamatan'),
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
        $criteria->compare('lokasi',$this->lokasi,true);
        $criteria->compare('kabupatenId',$this->kabupatenId);
        $criteria->compare('kecamatanId',$this->kecamatanId);
        $criteria->compare('programKknId',$this->programKknId);
        $criteria->compare('jumlahAnggota',$this->jumlahAnggota);
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
    public function searchAvailableKelompok($mahasiswa_id,$filter)
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
        $criteria->params['jurusanId'] =  $mahasiswa->jurusanId;
        $criteria->addCondition('t.jumlahAnggota < :jmaxAnggota');
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
        if ($this->programKkn !== null) {
            return $this->programKkn->nama;
        } else {
            return Yii::t('app','Belum ditetapkan');
        }
    }
    
    
    
    
}
