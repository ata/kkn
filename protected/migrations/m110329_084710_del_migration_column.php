<?php

class m110329_084710_del_migration_column extends CDbMigration
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
