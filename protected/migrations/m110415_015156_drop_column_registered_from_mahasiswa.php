<?php

class m110415_015156_drop_column_registered_from_mahasiswa extends CDbMigration
{

	public function safeUp()
	{
		$this->dropColumn('mahasiswa','registered');
	}

	public function safeDown()
	{
		$this->addColumn('mahasiswa','registered','boolean');
	}

}
