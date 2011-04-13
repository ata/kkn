<?php

class m110412_070925_add_program_studi_into_mahasiswa extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('mahasiswa','programStudiId','integer');
		$this->addForeignKey('mahasiswa_programStudiId','mahasiswa',
				'programStudiId','program_studi','id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('mahasiswa_programStudiId','mahasiswa');
		$this->dropColumn('mahasiswa','programStudiId');
	}
}
