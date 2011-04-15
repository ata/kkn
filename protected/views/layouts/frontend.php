<?php $this->beginContent('//layouts/main'); ?>

<div id="slideshow">
	<div class="container">
		<img src="<?php echo Yii::app()->request->baseUrl?>/images/slideshow1.jpg">
	</div>
</div>

<div id="main">
	<div class="container">
		<div id="content">
			<div class="container">
				<div class="span-16">
					<?php echo $content?>
				</div>
				<?php if(Yii::app()->user->isGuest):?>
				<div class="span-8 last" id="fsidebar">
					<div id="fp-login-form">
						<h2>LOGIN</h2>
						<form action="<?php echo $this->createUrl('site/login')?>" method="post">
							<label>Username</label>
							<input name="LoginForm[username]" type="text"><br>
							<label>Password</label>
							<input name="LoginForm[password]" type="password"><br>
							<input type="submit" value="LOGIN" class="button floatRight">
						</form>
						<div class="clear"></div>
						<p><?php echo Yii::t('app','Belum terdaftar? Silakan registrasi')?></p>
					</div>
					<div id="register-form">
						<h2 class="floatRight"><?php echo Yii::t('app','REGISTRASI')?></h2>
						<div class="clear"></div>
						<form action="<?php echo $this->createUrl('/register')?>" method="post">
							<label>NIM</label><br>
							<input type="text" name="Mahasiswa[nim]"><br>
							<input type="submit" value="DAFTAR" class="button">
						</form>
					</div>
				</div>
				<?php endif?>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
