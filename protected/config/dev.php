<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			/* uncomment the following to provide test database connection
			'db'=>array(
				'connectionString'=>'DSN for test database',
			),
			*/
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=kkn_dev',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'root',
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
					),

				),
			),
		),
	)
);

