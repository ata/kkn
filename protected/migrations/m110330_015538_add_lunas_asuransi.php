<?php

class m110330_015538_add_lunas_asuransi extends CDbMigration
{
	public function up()
	{
		$this->addColumn('mahasiswa','lunasAsuransi','boolean');
		$this->addColumn('mahasiswa','jumlahAsuransi','double');
	}

	public function down()
	{
		$this->dropColumn('mahasiswa','lunasAsuransi');
		$this->dropColumn('mahasiswa','jumlahAsuransi');
	}
}
