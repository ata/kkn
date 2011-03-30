<?php

class m110329_101701_add_size_to_lampiran extends CDbMigration
{
	public function up()
	{
		$this->addColumn('program_kkn_lampiran','size','double');
	}

	public function down()
	{
		$this->dropColumn('program_kkn_lampiran','size');
	}
}
