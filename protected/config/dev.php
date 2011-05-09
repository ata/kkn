<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'db'=> require(dirname(__FILE__).'/database.php'),
			'urlManager' => array(
				'urlFormat'=>'get',
				'showScriptName' => true,
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

