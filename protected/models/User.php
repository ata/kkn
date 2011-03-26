<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $created
 * @property string $modified
 */
class User extends ActiveRecord
{
	
	const ROLE_ADMIN = 'ADMIN';
	const ROLE_DOSEN = 'DOSEN';
	const ROLE_MAHASISWA = 'MAHASISWA';
	
	
	protected $_displayField = 'username';
	public $requestNewPassword = false;
	public $confirmPassword;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{ 
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('username, password, email, nama,role', 'length', 'max'=>255),
			array('confirmPassword','compare','compareAttribute'=>'password'),
			array('confirmPassword','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, nama, role, created, modified', 'safe', 'on'=>'search'),
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
			'mahasiswa' => array(self::HAS_ONE, 'Mahasiswa','userId'),
			'dosen' => array(self::HAS_ONE,'DOsen','userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'username' => Yii::t('app','Username'),
			'password' => Yii::t('app','Password'),
			'email' => Yii::t('app','Email'),
			'nama' => Yii::t('app','Nama'),
			'created' => Yii::t('app','Created'),
			'modified' => Yii::t('app','Modified'),
		);
	}
	
	protected function afterValidate()
	{
		if(!$this->isNewRecord && !$this->requestNewPassword){
			$this->clearErrors('password');
			$this->clearErrors('confirmPassword');
		}
		
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		$this->username = strtolower($this->username);
		$this->email = strtolower($this->email);
		if($this->isNewRecord || $this->requestNewPassword) {
			$this->password = md5($this->password);
		}
		return parent::beforeSave();
	}
	
	public function displayName()
	{
		return !empty($this->nama)?$this->nama:$this->username;
	}

}
