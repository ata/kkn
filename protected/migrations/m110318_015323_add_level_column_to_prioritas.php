<?php

class m110318_015323_add_level_column_to_prioritas extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('prioritas','level','integer');
	}

	public function safeDown()
	{
		$this->dropColumn('prioritas','level');
	}
}
