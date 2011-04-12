<?php

class m110321_035537_create_table_dosen extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('dosen',array(
			'id' => 'pk',
			'nip' => 'string NOT NULL',
			'namaLengkap' => 'string NOT NULL',
			'jenisKelamin' => 'string NOT NULL',
			'userId' => 'integer',
			'fakultasId'  => 'integer',
			'jurusanId'  => 'integer',
			'kontak' => 'string',
			'created' => 'datetime',
			'modified' => 'datetime',
		),'engine=innoDB');
		$this->addForeignKey('dosen_userId','dosen','userId','user','id');
		$this->addForeignKey('dosen_fakultasId','dosen','fakultasId','fakultas','id');
		$this->addForeignKey('dosen_jurusanId','dosen','jurusanId','jurusan','id');

	}

	public function safeDown()
	{
		$this->dropTable('dosen');
	}
}
