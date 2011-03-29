<?php

class m110329_084710_del_migration_column extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('mahasiswa','registered');
	}

	public function down()
	{
		$this->addColumn('mahasiswa','registered','boolean');
	}
}
