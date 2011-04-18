<?php

class m110417_233606_add_keterangan_to_kelompok extends CDbMigration
{

	public function safeUp()
	{
		$this->addColumn('kelompok','keterangan','text');
	}

	public function safeDown()
	{
		$this->dropColumn('kelompok','keterangan');
	}
}
