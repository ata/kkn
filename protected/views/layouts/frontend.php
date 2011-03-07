<?php $this->beginContent('//layouts/main'); ?>
<div id="main">
    <div class="container">
		<div id="content">
			<div class="container">
			<div class="span-16">
				<?php echo $content?>
			</div>
			<div class="span-8 last" id="fsidebar">
				<div id="login-form">
					<h2>LOGIN</h2>
					<form>
						<label></label>
						<input type="text"><br>
						<input type="password"><br>
						<input type="submit" value="LOGIN">
					</form>
					<div class="clear"></div>
				</div>
				<div id="register-form">
					<h2 class="floatRight">REGISTRASI</h2>
					<form>
						<label></label>
						<input type="text"><br>
						<input type="password"><br>
						<input type="submit" value="DAFTAR">
					</form>
					<div class="clear"></div>
				</div>
			</div>
			</div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
