<?php $this->beginContent('//layouts/main'); ?>
<div id="main">
    <div class="container">
		<div id="content">
			<div class="container">
			<div class="span-16">
				<?php echo $content?>
			</div>
			<div class="span-8 last" id="fsidebar">
				<div id="fp-login-form">
					<h2>LOGIN</h2>
					<form>
						<label>Username</label>
						<input type="text"><br>
						<label>Password</label>
						<input type="password"><br>
						<input type="submit" value="LOGIN" class="button floatRight">
					</form>
					<div class="clear"></div>
					<p>Belum terdaftar? Silakan registrasi</p>
				</div>
				<div id="register-form">
					<h2 class="floatRight">REGISTRASI</h2>
					<div class="clear"></div>
					<form>
						<label>NIM</label><br>
						<input type="text"><br>
						<input type="submit" value="DAFTAR" class="button">
					</form>
				</div>
			</div>
			</div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
