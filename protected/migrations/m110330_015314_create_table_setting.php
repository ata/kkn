<?php

class m110330_015314_create_table_setting extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('setting',array(
			'id' => 'pk',
			'key' => 'string NOT NULL',
			'value' => 'string NOT NULL',
			'created' => 'DATETIME NOT NULL',
			'modified' => 'DATETIME NOT NULL',
		),'engine=innoDB');
	}

	public function safeDown()
	{
		$this->dropTable('setting');
	}
}
