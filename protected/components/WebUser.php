<?php

class WebUser extends CWebUser
{

	public function login($identity,$duration=0)
	{
		$this->setRole($identity);
		$this->setFullname($identity);
		parent::login($identity,$duration);
	}


	public function setFullname($identity)
	{
		$this->setState('__fullname',$identity->fullname);
	}

	public function getFullname()
	{
		return $this->getState('__fullname');
	}

	public function setRole($identity)
	{
		$this->setState('__role',$identity->role);
	}

	public function getRole()
	{
		return $this->getState('__role');
	}
	public function getReturnUrl($defaultUrl=null)
	{
		if($this->role === User::ROLE_MAHASISWA) {
			return Yii::app()->createUrl('mahasiswa/kelompok/view');
		} else if($this->role === User::ROLE_DOSEN) {
			return Yii::app()->createUrl('pembimbing/kelompok');
		}
		return Yii::app()->createUrl('admin/default');
	}

	/**
	 * @override Hack!
	 */
	public function checkAccess($operation,$params=array(),$allowCaching=true)
	{
		if ($operation === $this->role) {
			return true;
		}
		return false;
	}



}
