<?php

class m110329_100746_add_mimetype_to_lampiran extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('program_kkn_lampiran','mimetype','string');
	}

	public function safeDown()
	{
		$this->dropColumn('program_kkn_lampiran','mimetype');
	}
}
