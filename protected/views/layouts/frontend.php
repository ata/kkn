<?php $this->beginContent('//layouts/main'); ?>


<?php Yii::app()->clientScript->registerScript('rotator-js','
	function rotate()
	{
		var current = ($("#rotator ul li.show")?  $("#rotator ul li.show") : $("div#rotator ul li:first"));
		var next = ((current.next().length) ? ((current.next().hasClass("show")) ? $("#rotator ul li:first") :current.next()) : $("#rotator ul li:first"));

		next.css({opacity: 0.0})
		.addClass("show")
		.animate({opacity: 1.0}, 1000);

		current.animate({opacity: 0.0}, 1000)
		.removeClass("show");
	}

	function theRotator() {
		$("#rotator ul li").css({opacity: 0.0});
		$("#rotator ul li:first").css({opacity: 1.0});
		setInterval(rotate,6000);
		//penggantian gambar setiap 6 detik sekali
	}

	theRotator();
	$("#rotator").fadeIn(1000);
	$("#rotator ul li").fadeIn(1000);
')?>
<div class="container">
	<div id="rotator">
		<ul>
			<li class="show"><img src="<?php echo Yii::app()->request->baseUrl?>/images/slideshow1.jpg"></li>
			<li><img src="<?php echo Yii::app()->request->baseUrl?>/images/banner2.jpg"></li>
			<li><img src="<?php echo Yii::app()->request->baseUrl?>/images/slideshow1.jpg"></li>
		</ul>
	</div>
</div>

<div id="main">
	<div class="container">
		<div id="content">
			<div class="container">
			<div class="span-16">
				<?php echo $content?>
			</div>
			<div class="span-8 last" id="fsidebar">
				<ul>
					<li id="fp-login-form">
						<h2>LOGIN</h2>
						<form>
							<label>Username</label>
							<input type="text"><br>
							<label>Password</label>
							<input type="password"><br>
							<input type="submit" value="LOGIN" class="button floatRight">
						</form>
						<div class="clear"></div>
						<p><?php echo Yii::t('app','Belum terdaftar? Silakan registrasi')?></p>
					</li>
					<li id="register-form">
						<h2 class="floatRight">REGISTRASI</h2>
						<div class="clear"></div>
						<form>
							<label>NIM</label><br>
							<input type="text"><br>
							<input type="submit" value="DAFTAR" class="button">
						</form>
					</li>
					<li>
						<h2>SIDEBAR</h2>
						<p>Lorem ipsum dolor sit amet.</p>
					</li>
				</ul>
			</div>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
