<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'KKN Online',
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),
    // application components
    'components'=>array(
        /*
        'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        */
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=kkn_dev',
            'emulatePrepare' => true,
            'username' => 'kkn',
            'password' => 'kkn',
            'charset' => 'utf8',
        ),
        
    ),
);
