<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
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
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(

					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning',
					),
					// uncomment the following to show log messages on web pages

					array(
						'class'=>'CWebLogRoute',
						//'showInFireBug' => true,
					),


				),
			),
		),
	)
);
