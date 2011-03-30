<?php

class m110330_015314_create_table_setting extends CDbMigration
{
	public function up()
	{
		$this->createTable('setting',array(
			'id' => 'pk',
			'key' => 'string NOT NULL',
			'value' => 'string NOT NULL',
			'created' => 'DATETIME NOT NULL',
			'modified' => 'DATETIME NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('setting');
	}
}
