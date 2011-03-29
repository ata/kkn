<?php

class m110329_100746_add_mimetype_to_lampiran extends CDbMigration
{
	public function up()
	{
		$this->addColumn('program_kkn_lampiran','mimetype','string');
	}

	public function down()
	{
		$this->dropColumn('program_kkn_lampiran','mimetype');
	}
}
