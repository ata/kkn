<?php

class m110321_011911_user_id_in_mahasiswa extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('mahasiswa','userId','integer');
	}

	public function safeDown()
	{
		$this->dropColumn('mahasiswa','userId');
	}
}
