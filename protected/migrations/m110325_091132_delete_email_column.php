<?php

class m110325_091132_delete_email_column extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('fakultas','email');
		$this->dropColumn('jurusan','email');
		$this->dropColumn('jenjang','email');
		$this->dropColumn('program_studi','email');
	}

	public function down()
	{
		$this->addColumn('fakultas','email','string NOT NULL');
		$this->addColumn('jurusan','email','string NOT NULL');
		$this->addColumn('jenjang','email','string NOT NULL');
		$this->addColumn('program_studi','email','string NOT NULL');
	}
}
