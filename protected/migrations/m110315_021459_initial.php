<?php

class m110315_021459_initial extends CDbMigration
{
	public function safeUp()
	{
		// 1
		$this->createTable('user',array(
			'id' => 'pk',
			'username' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'role' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'nama' => 'string NOT NULL',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		// 2
		$this->createTable('fakultas',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'kode' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		// 3
		$this->createTable('jenjang',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'kode' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		// 4
		$this->createTable('jurusan',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'kode' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'jenjangId' => 'integer',
			'fakultasId' => 'integer',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		$this->addForeignKey('jurusan_jenjangId','jurusan','jenjangId','jenjang','id');
		$this->addForeignKey('jurusan_fakultasId','jurusan','fakultasId','fakultas','id');

		// 5
		$this->createTable('program_studi',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'kode' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'jenjangId' => 'integer',
			'fakultasId' => 'integer',
			'jurusanId' => 'integer',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		$this->addForeignKey('program_studi_jenjangId','program_studi','jenjangId','jenjang','id');
		$this->addForeignKey('program_studi_fakultasId','program_studi','fakultasId','fakultas','id');
		$this->addForeignKey('program_studi_jurusanId','program_studi','jurusanId','jurusan','id');

		// 6
		$this->createTable('program_kkn',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'deskripsi' => 'text',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		// 7
		$this->createTable('program_kkn_lampiran',array(
			'id' => 'pk',
			'nama' => 'string',
			'path' => 'string',
			'programKknId' => 'integer',
		),'engine=innoDB');

		$this->addForeignKey('program_kkn_lampiran_programKknId',
							 'program_kkn_lampiran','programKknId',
							 'program_kkn','id');

		// 8
		$this->createTable('kabupaten',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		// 9
		$this->createTable('kecamatan',array(
			'id' => 'pk',
			'nama' => 'string NOT NULL',
			'kabupatenId' => 'integer',
			'programKknId' => 'integer',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		$this->addForeignKey('kecamatan_kabupatenId',
							 'kecamatan','kabupatenId',
							 'kabupaten','id');

		$this->addForeignKey('kecamatan_programKknId',
							 'kecamatan','programKknId',
							 'program_kkn','id');

		// 10
		$this->createTable('berita',array(
			'id' => 'pk',
			'title' => 'string',
			'body' => 'text',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');

		// 11
		$this->createTable('prioritas',array(
			'id' => 'pk',
			'programKknId' => 'integer',
			'jurusanId' => 'integer',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');
		$this->addForeignKey('prioritas_programKknId',
							 'prioritas','programKknId',
							 'program_kkn','id');
		$this->addForeignKey('prioritas_jurusanId',
							 'prioritas','jurusanId',
							 'jurusan','id');

		// 12
		$this->createTable('kelompok',array(
			'id' => 'pk',
			'lokasi' => 'string NOT NULL',
			'kabupatenId' => 'integer',
			'kecamatanId' => 'integer',
			'programKknId' => 'integer',
			'latitude' => 'double',
			'longitude' => 'double',
			'jumlahAnggota' => 'integer',
			'jumlahLakiLaki' => 'integer',
			'jumlahPerempuan' => 'integer',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');
		$this->addForeignKey('kelompok_kabupatenId',
							 'kelompok','kabupatenId',
							 'kabupaten','id');
		$this->addForeignKey('kelompok_kecamatanId',
							 'kelompok','kecamatanId',
							 'kecamatan','id');
		$this->addForeignKey('kelompok_programKknId',
							 'kelompok','programKknId',
							 'program_kkn','id');

		$this->createTable('mahasiswa',array(
			'id' => 'pk',
			'namaLengkap' => 'string NOT NULL',
			'nim' => 'string NOT NULL',
			'alamatAsal' => 'string',
			'alamatTinggal' => 'string',
			'fakultasId' => 'integer',
			'jenjangId' => 'integer',
			'jurusanId' => 'integer',
			'kelompokId' => 'integer',
			'jenisKelamin' => 'string',
			'phone1' => 'string',
			'phone2' => 'string',
			'photoPath' => 'string',
			'registred' => 'boolean',
			'created' => 'datetime NOT NULL',
			'modified' => 'datetime NOT NULL',
		),'engine=innoDB');
		$this->addForeignKey('mahasiswa_jenjangId','mahasiswa','jenjangId','jenjang','id');
		$this->addForeignKey('mahasiswa_fakultasId','mahasiswa','fakultasId','fakultas','id');
		$this->addForeignKey('mahasiswa_jurusanId','mahasiswa','jurusanId','jurusan','id');
		$this->addForeignKey('mahasiswa_kelompokId','mahasiswa','kelompokId','kelompok','id');
	}

	public function safeDown()
	{
		$this->dropTable('mahasiswa');
		$this->dropTable('kelompok');
		$this->dropTable('prioritas');
		$this->dropTable('berita');
		$this->dropTable('kecamatan');
		$this->dropTable('kabupaten');
		$this->dropTable('program_kkn_lampiran');
		$this->dropTable('program_kkn');
		$this->dropTable('program_studi');
		$this->dropTable('jurusan');
		$this->dropTable('jenjang');
		$this->dropTable('fakultas');
		$this->dropTable('user');
	}
}
