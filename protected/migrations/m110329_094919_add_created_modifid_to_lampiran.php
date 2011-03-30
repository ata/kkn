<?php

class m110329_094919_add_created_modifid_to_lampiran extends CDbMigration
{
	public function up()
	{
		$this->addColumn('program_kkn_lampiran','created','datetime NOT NULL');
		$this->addColumn('program_kkn_lampiran','modified','datetime NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('program_kkn_lampiran','created');
		$this->dropColumn('program_kkn_lampiran','modified');
	}
}
