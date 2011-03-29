<?php

/**
 * This is the model class for table "program_kkn".
 *
 * The followings are the available columns in table 'program_kkn':
 * @property string $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $created
 * @property string $modified
 */
class ProgramKkn extends ActiveRecord
{
	
	/**
	 * untuk menampung attactment dari form field bertipe file
	 */
	public $files;
	
	protected $displayField = 'nama';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProgramKkn the static model class
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
		return 'program_kkn';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{ 
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, deskripsi', 'required'),
			array('id', 'length', 'max'=>20),
			array('nama', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, deskripsi, created, modified', 'safe', 'on'=>'search'),
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
			'lampiran' => array(self::HAS_MANY,'ProgramKknLampiran','programKknId'),
			
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
			'deskripsi' => Yii::t('app','Deskripsi'),
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
		$criteria->compare('deskripsi',$this->deskripsi,true);
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
	
	protected function afterSave()
	{
		if($this->isNewRecord){
			$this->saveLampiran();
		} else {
			$this->saveLampiran();
		}
		return parent::afterSave();
	}
	
	protected function beforeDelete()
	{
		
		foreach($this->lampiran as $lampiran){
			$lampiran->delete();
		}
		$this->deleteFile();
		
		return parent::beforeDelete();
	}
	
	private function deleteFile()
	{
		$path = 'files/lampiran/' . $this->id;
		$filePath = Yii::app()->params['webroot'].$path;
		$path = dir($filePath);
		while($isi = $path->read()){
			if($isi != "." && $isi != ".."){
				unlink($filePath.'/'.$isi);
			}
		}
		$path->close();
		rmdir($filePath);
	}
	
	public function saveLampiran()
	{
		$filePath = 'files/lampiran/' . $this->id;
		
		if($this->isNewRecord){
			if(!file_exists(Yii::app()->params['webroot']).$filePath){
				mkdir(Yii::app()->params['webroot'].$filePath,0775,true);
			}
		}
		$folder = Yii::app()->params['webroot'].$filePath.'/';
		
		$lampiran = CUploadedFile::getInstancesByName($this->files);
		foreach($lampiran as $data){
			$this->dbConnection->createCommand("INSERT INTO 
				program_kkn_lampiran (nama,path,programKknId)
				VALUES (:nama,:path,:programKknId)")->query(array(
					'nama'=>$data->name,
					'path'=>$folder.$data->name,
					'programKknId'=>$this->id,
				));
			$data->saveAs($folder.$data->name);
		}
		
		
	}
	
	public function getDisplayLampiran()
	{
		return Yii::t('app','Jumlah file lampiran {jumlah}',array(
			'{jumlah}'=>ProgramKknLampiran::model()->getCountLampiran($this->id)
		));
	}
	
	public function addPrioritas(Prioritas $prioritas)
	{
	}
	
	public function addLampiran(ProgramKkn $lampiran)
	{
	}
	
	public function findArrayPrioritasJurusanId()
	{
	}
}
