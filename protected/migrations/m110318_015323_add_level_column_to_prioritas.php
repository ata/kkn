<?php

class m110318_015323_add_level_column_to_prioritas extends CDbMigration
{
	public function up()
	{
		$this->addColumn('prioritas','level','integer');
	}

	public function down()
	{
		$this->dropColumn('prioritas','level');
	}
}
