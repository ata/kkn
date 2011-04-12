<?php

class m110412_041125_add_column_pembimbingId_into_kelompok extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('kelompok','pembimbingId','integer');
		$this->addForeignKey('kelompok_pembimbingId','kelompok','pembimbingId','dosen','id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('kelompok_pembimbingId','kelompok');
		$this->dropColumn('kelompok','pembimbingId');
	}
}
