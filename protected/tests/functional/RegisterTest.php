<?php
class SiteTest extends WebTestCase
{
	public function testIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'RAND()';
		$criteria->limit = 1;
		$criteria->condition = 'userId  IS NULL';
		while(true) {
			$mahasiswa = Mahasiswa::model()->find($criteria);
			if ($mahasiswa == null) {
				break;
			}
			$this->open("/kkn/index-test.php?r=register");
			$this->type("Mahasiswa[nim]", $mahasiswa->nim);
			$this->click("//input[@value='DAFTAR']");
			$this->waitForPageToLoad("30000");
			$this->type("Mahasiswa_alamatAsal", "Jl");
			$this->type("Mahasiswa_alamatTinggal", "Jl,");
			$this->type("Mahasiswa_phone1", "0222");
			$this->type("Mahasiswa_email", "mhs{$mahasiswa->id}@mail.com");
			$this->type("Mahasiswa_password", $mahasiswa->nim);
			$this->type("Mahasiswa_confirmPassword", $mahasiswa->nim);
			$this->type("Mahasiswa_verifyCode", "code");
			$this->click("yt0");
			$this->waitForPageToLoad("30000");
			$this->click("link=Login disini");
			$this->waitForPageToLoad("30000");
			$this->type("LoginForm_username", $mahasiswa->nim);
			$this->type("LoginForm_password", $mahasiswa->nim);
			$this->click("yt0");
			$this->waitForPageToLoad("30000");
			$this->click("link=Lihat detail");
			$this->waitForPageToLoad("30000");
			$this->click("yt0");
			$this->assertTrue((bool)preg_match('/^Anda tidak bisa memilih ulang kelompok, apa anda yakin akan memilih kelompok ini[\s\S]$/',$this->getConfirmation()));
			$this->click("link=Logout");
			$this->waitForPageToLoad("30000");
		}
	}
}
