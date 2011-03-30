<?php

class m110330_014123_add_registered_again extends CDbMigration
{
	public function up()
	{
		$this->addColumn('mahasiswa','registered','boolean');
	}

	public function down()
	{
		$this->dropColumn('mahasiswa','registered');
	}
}
