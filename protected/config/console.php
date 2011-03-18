<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'import'=>array(
		//'application.models.*',
		'application.components.*',
	),
	'components'=>array(
		'fixture'=>array(
			'class'=>'system.test.CDbFixtureManager',
		),
		
		'db'=> array(
			'connectionString' => 'mysql:host=localhost;dbname=kkn_dev',
			'emulatePrepare' => true,
			'username' => 'kkn',
			'password' => 'kkn',
			'charset' => 'utf8',
		),
	),
);
