<?php

class m110321_011911_user_id_in_mahasiswa extends CDbMigration
{
	public function up()
	{
		$this->addColumn('mahasiswa','userId','integer');
	}

	public function down()
	{
		$this->dropColumn('mahasiswa','userId');
	}
}
