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
