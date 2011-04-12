<?php

class m110330_014123_add_registered_again extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('mahasiswa','registered','boolean');
	}

	public function safeDown()
	{
		$this->dropColumn('mahasiswa','registered');
	}
}
