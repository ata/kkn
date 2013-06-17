<?php

class m110606_030434_add_ttl_to_mahasiswa extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('mahasiswa','tempatLahir','string');
		$this->addColumn('mahasiswa','tanggalLahir','date');
	}

	public function safeDown()
	{
		$this->dropColumn('mahasiswa','tempatLahir');
		$this->dropColumn('mahasiswa','tanggalLahir');
	}
}
