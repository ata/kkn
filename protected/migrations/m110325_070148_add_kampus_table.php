<?php

class m110325_070148_add_kampus_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('kampus',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'alamat' => 'string',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');
		
		$this->addColumn('mahasiswa','kampusId','integer');
		
		$this->addForeignKey('mahasiswa_kampusId','mahasiswa','kampusId','kampus','id');
	}

	public function down()
	{
		$this->dropForeignKey('mahasiswa_kampusId','mahasiswa');
		$this->dropColumn('mahasiswa','kampusId');
		$this->dropTable('kampus');
	}
}
