<?php

class DbAuthManager extends CDbAuthManager
{
	public $itemTable = 'auth_item';
	/**
	 * @var string the name of the table storing authorization item hierarchy. Defaults to 'AuthItemChild'.
	 */
	public $itemChildTable = 'auth_item_child';
	/**
	 * @var string the name of the table storing authorization item assignments. Defaults to 'AuthAssignment'.
	 */
	public $assignmentTable = 'auth_assignment';
	
	public $autoCreate = false;
	
	
	public function init()
	{
		parent::init();
		$this->createDefaultRoles();
	}
	
	/**
	 * call this method from 
	 */
	
	public function performAutoCreate()
	{
		$this->performAutoCreateOperation();
	}
	 
	public function performAutoCreateOperation($controller)
	{
		if ($this->autoCreate) {
			$operation = ucfirst($controller->id) . ucfirst($controller->action->id);
			if (!$this->isOperationExist($operation)){
				$this->createOperation($operation);
				$this->addItemChild('superuser',$operation);
			}
			
		}
	}
	
	protected function createDefaultRoles()
	{
		if (!$this->isRoleExist('superuser')) {
			$this->createRole('authenticated', 'authenticated user', 'return !Yii::app()->user->isGuest');
			$this->createRole('guest', 'not authenticated user', 'return Yii::app()->user->isGuest');
			$this->createRole('superuser', 'Super User', 'return Yii::app()->user->isSuperUser');
			$this->createRole('mahasiswa', 'Mahasiswa Peserta KKN');
			$this->assign('superuser','admin');
		}
	}
	
	
	public function isRoleExist($name)
	{
		return $this->isAuthItemExist($name, CAuthItem::TYPE_ROLE);
	}
	
	
	public function isOperationExist($name)
	{
		return $this->isAuthItemExist($name, CAuthItem::TYPE_OPERATION);
	}
	
	public function isTaskExist($name)
	{
		return $this->isAuthItemExist($name, CAuthItem::TYPE_TASK);
	}
	
	public function isAuthItemExist($name, $type)
	{
		$sql = "SELECT * FROM {$this->itemTable} WHERE name=:name AND type=:type ";
		$command=$this->db->createCommand($sql);
		$command->bindValue(':name',$name);
		$command->bindValue(':type',$type);
		return $command->queryRow() !== false;
	}
	
	
}
