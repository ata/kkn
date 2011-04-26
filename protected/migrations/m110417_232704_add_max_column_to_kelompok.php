<?php

class m110417_232704_add_max_column_to_kelompok extends CDbMigration
{

	public function safeUp()
	{
		$this->addColumn('kelompok','maxAnggota','integer');
		$this->addColumn('kelompok','maxLakiLaki','integer');
		$this->addColumn('kelompok','maxPerempuan','integer');
	}

	public function safeDown()
	{
		$this->dropColumn('kelompok','maxPerempuan');
		$this->dropColumn('kelompok','maxLakiLaki');
		$this->dropColumn('kelompok','maxAnggota');
	}
}
