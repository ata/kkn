<?php

class m110325_075416_add_column_kampus_to_jurusan_and_prodi extends CDbMigration
{
	public function safeUp()
	{
		$this->dropForeignKey('program_studi_jurusanId','program_studi');
		$this->dropColumn('program_studi','jurusanId');
	}

	public function safeDown()
	{
		$this->addColumn('program_studi','jurusanId','integer');
		$this->addForeignKey('program_studi_jurusanId','program_studi','jurusanId','jurusan','id');
	}
}
