<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'urlManager' => array(
				'urlFormat'=>'get',
				'showScriptName' => true,
			),
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
	)
);
