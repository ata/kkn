<?php

class KelompokTest extends CDbTestCase
{
	public $fixtures=array(
		'kelompoks'=>'Kelompok',
	);

	public function testCreate()
	{

	}

	public function testUser()
	{
		echo Kelompok::model()->user;
	}
}
